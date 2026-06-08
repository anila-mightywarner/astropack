<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminUsers */

$this->title = 'Update Admin Users: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa fa-list"></i><span> Manage Admin User</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm', 'style' => 'display: inline-block;']) ?>
                <?= Html::a('<i class="fa fa-pencil-square-o"></i><span> Change password</span>', ['change-password'], ['class' => 'btn btn-block btn-info btn-sm', 'style' => 'display: inline-block;margin-top: 0px;']) ?>
                <div class="admin-users-update">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>