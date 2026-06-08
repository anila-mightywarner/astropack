<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SpecificationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Specifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specifications-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= \common\components\ProductTopLinksWidget::widget(['product' => $product]) ?>
                    <?= Html::a('<i class="fa fa-list"></i><span> Create Specifications</span>', ['create', 'product' => $product], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                    <?= \common\components\AlertMessageWidget::widget() ?>                                                      
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'specification',
                            'description:ntext',
                            [
                                'attribute' => 'status',
                                'value' => function($model, $key, $index, $column) {
                                    return $model->status == 1 ? 'Enabled' : 'Disabled';
                                },
                                'filter' => [1 => 'Enabled', 0 => 'Disabled'],
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                    'title' => Yii::t('app', 'update'),
                                                    'class' => '',
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                    'title' => Yii::t('app', 'delete'),
                                                    'class' => '',
                                        ]);
                                    },
                                ],
                                'urlCreator' => function ($action, $model) {
                                    if ($action === 'update') {
                                        return Url::to(['update', 'id' => $model->id, 'product' => $model->product_id]);
                                    }
                                    if ($action === 'delete') {
                                        return Url::to(['delete', 'id' => $model->id]);
                                    }
                                }
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


