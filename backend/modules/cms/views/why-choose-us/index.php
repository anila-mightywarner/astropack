<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WhyChooseUsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Why Choose uses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="why-choose-us-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?php // Html::a('<i class="fa fa-list"></i><span> Create Why Choose Us</span>', ['create'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->image))
                                        $img = '<img width="40px" src="' . Yii::$app->homeUrl . '../uploads/why-choose/' . $data->id . '/small.' . $data->image . '"/>';
                                    return $img;
                                },
                            ],
                            'title',
                            [
                                'attribute' => 'status',
                                'value' => function($model, $key, $index, $column) {
                                    return $model->status == 0 ? 'Disabled' : 'Enabled';
                                },
                                'filter' => [1 => 'Enabled', 0 => 'Disabled'],
                            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}',
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


