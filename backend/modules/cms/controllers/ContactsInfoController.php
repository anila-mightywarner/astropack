<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\ContactsInfo;
use common\models\ContactsInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ContactsInfoController implements the CRUD actions for ContactsInfo model.
 */
class ContactsInfoController extends Controller {

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
     * Lists all ContactsInfo models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ContactsInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContactsInfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContactsInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ContactsInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ContactsInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate() {
        $id = 1;
        $model = $this->findModel($id);
//        $brochure_ = $model->brochure;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
//            $brochure = UploadedFile::getInstance($model, 'brochure');
//            $model->brochure = !empty($brochure) ? $brochure->extension : $brochure_;
            if ($model->validate() && $model->save()) {
//                $this->Upload($brochure);
            }
            Yii::$app->session->setFlash('success', "Contact information updated successfully");
            return $this->redirect(['update', 'id' => $model->id]);
        }return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /*
     * Uploade about page images
     */

    public function Upload($brochure) {
        $paths = Yii::$app->basePath . '/../uploads/brochure/';
        if (!empty($brochure)) {
            $name = 'brochure.' . $brochure->extension;
            $brochure->saveAs($paths . '/' . $name);
        }
        return TRUE;
    }

    /**
     * Deletes an existing ContactsInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ContactsInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactsInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ContactsInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
