<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BrochureDownloadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brochure Downloads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brochure-download-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= \common\components\AlertMessageWidget::widget() ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'product_id',
                                'value' => function($data) {
                                    return common\models\Products::findOne($data->product_id)->product_title;
                                },
                                'filter' => \yii\helpers\ArrayHelper::map(common\models\Products::find()->asArray()->all(), 'id', 'product_title'),
                            ],
                            'name',
                            'email:email',
                            'phone',
                            [
                                'attribute' => 'message',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->message)) {
                                        $message = wordwrap($data->message, 50, "<br />\n");
                                        return $message;
                                    } else {
                                        return '';
                                    }
                                },
                            ],
                            'date',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


