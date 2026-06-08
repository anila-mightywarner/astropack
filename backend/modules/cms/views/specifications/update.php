<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Specifications */

$this->title = 'Update Specifications';
$this->params['breadcrumbs'][] = ['label' => 'Specifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?= \common\components\ProductTopLinksWidget::widget(['product' => $product]) ?>
                <div class="specifications-create">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                        'product' => $product,
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
