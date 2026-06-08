<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\KeyFeatures;
use common\models\KeyFeaturesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KeyFeaturesController implements the CRUD actions for KeyFeatures model.
 */
class KeyFeaturesController extends Controller {

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
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all KeyFeatures models.
     * @return mixed
     */
    public function actionIndex($product) {
        $searchModel = new KeyFeaturesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['product_id' => $product]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'product' => $product,
        ]);
    }

    /**
     * Displays a single KeyFeatures model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KeyFeatures model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($product) {
        $model = new KeyFeatures();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->product_id = $product;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "New feature added successfully");
                return $this->redirect(['index', 'product' => $product]);
            }
        } return $this->render('create', [
                    'model' => $model,
                    'product' => $product,
        ]);
    }

    /**
     * Updates an existing KeyFeatures model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $product) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->save()) {
            Yii::$app->session->setFlash('success', "Data updated successfully");
            return $this->redirect(['update', 'id' => $model->id, 'product' => $product]);
        } return $this->render('update', [
                    'model' => $model,
                    'product' => $product,
        ]);
    }

    /**
     * Deletes an existing KeyFeatures model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $product = $model->product_id;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', "Data removed successfully");
        }

        return $this->redirect(['index', 'product' => $product]);
    }

    /**
     * Finds the KeyFeatures model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeyFeatures the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = KeyFeatures::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
