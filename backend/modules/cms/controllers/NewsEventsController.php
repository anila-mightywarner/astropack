<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\NewsEvents;
use common\models\NewsEventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsEventsController implements the CRUD actions for NewsEvents model.
 */
class NewsEventsController extends Controller {

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
     * Lists all NewsEvents models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NewsEventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsEvents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NewsEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new NewsEvents();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $model->image = $image->extension;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path1 = Yii::$app->basePath . '/../uploads/news_events/profile/' . $model->id . '/';
                    $size1 = [['width' => 50, 'height' => 50, 'name' => 'small'], ['width' => 700, 'height' => 465, 'name' => 'image'],];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path1, $size1);
                }
                Yii::$app->session->setFlash('success', "New news & event added successfully");
                $model = new NewsEvents();
            }
        } return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing NewsEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model_ = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $image = UploadedFile::getInstance($model, 'image');
            $model->image = !empty($image) ? $image->extension : $model_->image;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path1 = Yii::$app->basePath . '/../uploads/news_events/profile/' . $model->id . '/';
                    $size1 = [['width' => 130, 'height' => 80, 'name' => 'small'], ['width' => 700, 'height' => 465, 'name' => 'image'],];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path1, $size1);
                }
                Yii::$app->session->setFlash('success', "News & events updated successfully");
            }
            return $this->redirect(['update', 'id' => $model->id]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NewsEvents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            $path = Yii::$app->basePath . '/../uploads/news_events/profile/' . $id;
            $this->deleteDir($path);
            Yii::$app->session->setFlash('success', "Service removed successfully");
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
     * Finds the NewsEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = NewsEvents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
