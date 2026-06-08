<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\Brands;
use common\models\BrandsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BrandsController implements the CRUD actions for Brands model.
 */
class BrandsController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/site/index']);
            return false;
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Brands models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BrandsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brands model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Brands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Brands();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $banner_images = UploadedFile::getInstances($model, 'banner_images');
            $model->image = $image->extension;
            if ($model->validate() && $model->save()) {
                $this->Upload($model, $image, $banner_images);
                Yii::$app->session->setFlash('success', "New brand added successfully");
                $model = new Brands();
            }
        }return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /*
     * Uploade about page images
     */

    public function Upload($model, $image, $banner_images) {
        if (!empty($image)) {
            $path = Yii::$app->basePath . '/../uploads/brands/' . $model->id . '/';
            $size = [['width' => 100, 'height' => 100, 'name' => 'small'], ['width' => 175, 'height' => 120, 'name' => 'image'],];
            Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
        }
        if (!empty($banner_images)) {
            $paths = Yii::$app->basePath . '/../uploads/brands/banner/' . $model->id . '/';
            $path = $this->CheckPath($paths);
            foreach ($banner_images as $banner_image) {
                $name = $this->fileExists($path, $banner_image->baseName . '.' . $banner_image->extension, $banner_image, 1);
                $banner_image->saveAs($path . '/' . $name);
            }
        }
        return TRUE;
    }

    public function CheckPath($paths) {
        if (!is_dir($paths)) {
            mkdir($paths);
        }
        return $paths;
    }

    public function fileExists($path, $name, $file, $sufix) {
        if (file_exists($path . '/' . $name)) {

            $name = basename($path . '/' . $file->baseName, '.' . $file->extension) . '_' . $sufix . '.' . $file->extension;
            return $this->fileExists($path, $name, $file, $sufix + 1);
        } else {
            return $name;
        }
    }

    public function actionRemoveBanner($file, $id) {
        $path = Yii::$app->basePath . '/../uploads/brands/banner/' . $id . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Updates an existing Brands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image_ = $model->image;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $banner_images = UploadedFile::getInstances($model, 'banner_images');
            $model->image = !empty($image) ? $image->extension : $image_;
            if ($model->validate() && $model->save()) {
                $this->Upload($model, $image, $banner_images);
            }
            Yii::$app->session->setFlash('success', "Brand updated successfully");
            return $this->redirect(['update', 'id' => $model->id]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Brands model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            $path = Yii::$app->basePath . '/../uploads/brands/' . $id;
            $this->deleteDir($path);
            Yii::$app->session->setFlash('success', "Brand removed successfully");
        }
        return $this->redirect(['index']);
    }

    public function deleteDir($dirPath) {
        if (is_dir($dirPath)) {
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::deleteDir($file);
                } else {
                    unlink($file);
                }
            }
        }
        rmdir($dirPath);
    }

    /**
     * Finds the Brands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Brands::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
