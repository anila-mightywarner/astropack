<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KeyFeatures */

$this->title = 'Create Key Features';
$this->params['breadcrumbs'][] = ['label' => 'Key Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

            </div>
            <div class="panel-body">
                <?= \common\components\ProductTopLinksWidget::widget(['product' => $product]) ?>
                <div class="key-features-create">
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

