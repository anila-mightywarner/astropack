<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactAddress */

$this->title = 'Update Contact Address: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contact Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?=  Html::a('<i class="fa fa-list"></i><span> Manage Contact Address</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                <div class="contact-address-create">
                    <?= $this->render('_form', [
                    'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
