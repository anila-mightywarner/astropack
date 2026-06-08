<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\Products;
use common\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller {

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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Products();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            if (isset($model->related_products) && $model->related_products != '') {
                $model->related_products = implode(',', $model->related_products);
            }
            $image = UploadedFile::getInstance($model, 'image');
            $brochure = UploadedFile::getInstance($model, 'brochure');
            $files = UploadedFile::getInstances($model, 'gallery_images');
            $banner_images = UploadedFile::getInstances($model, 'banner_images');
            $model->image = $image->extension;
            $model->brochure = !empty($brochure) ? $brochure->extension : '';
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/products/' . $model->id . '/';
                    $size = [['width' => 100, 'height' => 100, 'name' => 'small'], ['width' => 500, 'height' => 500, 'name' => 'image'],];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                $this->Upload($brochure, $model, $files, $banner_images);
                Yii::$app->session->setFlash('success', "New product added successfully");
                $model = new Products();
            }
        }return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /*
     * Uploade about page images
     */

    public function Upload($brochure, $model, $files, $banner_images) {
        if (!empty($brochure)) {
            $paths = Yii::$app->basePath . '/../uploads/products/brochure/' . $model->id;
            if (!is_dir($paths)) {
                mkdir($paths);
            }
            $name = 'brochure.' . $brochure->extension;
            $brochure->saveAs($paths . '/' . $name);
        }
        if (!empty($files)) {
            $paths = Yii::$app->basePath . '/../uploads/products/gallery/' . $model->id . '/';
            $path = $this->CheckPath($paths);
            foreach ($files as $file) {
                $name = $this->fileExists($path, $file->baseName . '.' . $file->extension, $file, 1);
                $file->saveAs($path . '/' . $name);
            }
        }
        if (!empty($banner_images)) {
            $paths = Yii::$app->basePath . '/../uploads/products/banner/' . $model->id . '/';
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

    public function actionRemove($file, $id) {
        $path = Yii::$app->basePath . '/../uploads/products/gallery/' . $id . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRemoveBanner($file, $id) {
        $path = Yii::$app->basePath . '/../uploads/products/banner/' . $id . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image_ = $model->image;
        $brochure_ = $model->brochure;
        $video_ = $model->video;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            if (isset($model->related_products) && $model->related_products != '') {
                $model->related_products = implode(',', $model->related_products);
            }
            $image = UploadedFile::getInstance($model, 'image');
            $brochure = UploadedFile::getInstance($model, 'brochure');
            $files = UploadedFile::getInstances($model, 'gallery_images');
            $banner_images = UploadedFile::getInstances($model, 'banner_images');
            $model->image = !empty($image) ? $image->extension : $image_;
            $model->brochure = !empty($brochure) ? $brochure->extension : $brochure_;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/products/' . $model->id . '/';
                    $size = [['width' => 100, 'height' => 100, 'name' => 'small'], ['width' => 500, 'height' => 500, 'name' => 'image'],];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                $this->Upload($brochure, $model, $files, $banner_images);
            }
            Yii::$app->session->setFlash('success', "Product details updated successfully");
            return $this->redirect(['update', 'id' => $model->id]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            $path = Yii::$app->basePath . '/../uploads/products/' . $id;
            $this->deleteDir($path);
            Yii::$app->session->setFlash('success', "Product removed successfully");
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
     * This function select subcategory based on category
     * return result to the view
     */

    public function actionGetCategory() {
        if (Yii::$app->request->isAjax) {
            $category = $_POST['category'];
            $subcategories = \common\models\SubCategory::findAll(['category' => $category, 'status' => 1]);
            $options = '<option value="">- Select -</option>';
            foreach ($subcategories as $subcategory) {
                $options .= "<option value='" . $subcategory->id . "'>" . $subcategory->sub_category . "</option>";
            }

            echo $options;
        }
    }

}
