<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\BanerImages;
use common\models\BanerImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BanerImagesController implements the CRUD actions for BanerImages model.
 */
class BanerImagesController extends Controller {

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
     * Lists all BanerImages models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BanerImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BanerImages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BanerImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new BanerImages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BanerImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate() {
        $id = 1;
        $model = $this->findModel($id);
        $model_ = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $about = UploadedFile::getInstance($model, 'about');
            $products = UploadedFile::getInstance($model, 'products');
            $services = UploadedFile::getInstance($model, 'services');
            $brands = UploadedFile::getInstance($model, 'brands');
            $events = UploadedFile::getInstance($model, 'events');
            $contact_us = UploadedFile::getInstance($model, 'contact_us');
            $model->about = !empty($about) ? $about->extension : $model_->about;
            $model->products = !empty($products) ? $products->extension : $model_->products;
            $model->services = !empty($services) ? $services->extension : $model_->services;
            $model->brands = !empty($brands) ? $brands->extension : $model_->brands;
            $model->events = !empty($events) ? $events->extension : $model_->events;
            $model->contact_us = !empty($contact_us) ? $contact_us->extension : $model_->contact_us;
            $product_banner = UploadedFile::getInstances($model, 'product_banner');
            if ($model->save()) {
                $this->Upload($about, $products, $services, $brands, $events, $contact_us, $product_banner);
                Yii::$app->session->setFlash('success', "Baner images updated successfully");
            }
        } return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function Upload($about, $products, $services, $brands, $events, $contact_us, $product_banner) {
        $paths = Yii::$app->basePath . '/../uploads/baner_images/';
        if (!empty($about)) {
            $name = 'about.' . $about->extension;
            $about->saveAs($paths . '/' . $name);
        }
        if (!empty($products)) {
            $name = 'products.' . $products->extension;
            $products->saveAs($paths . '/' . $name);
        }
        if (!empty($services)) {
            $name = 'services.' . $services->extension;
            $services->saveAs($paths . '/' . $name);
        }
        if (!empty($brands)) {
            $name = 'brands.' . $brands->extension;
            $brands->saveAs($paths . '/' . $name);
        }
        if (!empty($events)) {
            $name = 'events.' . $events->extension;
            $events->saveAs($paths . '/' . $name);
        }
        if (!empty($contact_us)) {
            $name = 'contact_us.' . $contact_us->extension;
            $contact_us->saveAs($paths . '/' . $name);
        }
        if (!empty($product_banner)) {
            $paths = Yii::$app->basePath . '/../uploads/baner_images/product/';
            $path = $this->CheckPath($paths);
            foreach ($product_banner as $banner) {
                $name = $this->fileExists($path, $banner->baseName . '.' . $banner->extension, $banner, 1);
                $banner->saveAs($path . '/' . $name);
            }
        }
        return true;
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

    public function actionRemove($file) {
        $path = Yii::$app->basePath . '/../uploads/baner_images/product/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing BanerImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BanerImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BanerImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = BanerImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
