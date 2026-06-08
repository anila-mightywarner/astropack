<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BanerImages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Baner Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="baner-images-view">
                        <p>
                            <?=  Html::a('<i class="fa fa-list"></i><span> Manage Baner Images</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                            ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                    'id',
            'about',
            'mgvision_difference',
            'sustainability',
            'security_market',
            'customer_stories',
            'corporate_governance',
            'products_and_solutions',
            'where_to_buy',
            'search_result',
            'partners',
            'careers',
            'news_events',
            'contact',
            'status',
            'CB',
            'UB',
            'DOC',
            'DOU',
                        ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


