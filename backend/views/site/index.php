<?php
/* @var $this yii\web\View */

$this->title = 'AstropackGulf';
?>
<style>
    .outer {
        display: table;
        height: 100%;
        width: 100%;
    }

    .middle {
        display: table-cell;
        vertical-align: middle;
    }

    .inner {
        margin-left: auto;
        margin-right: auto;
        padding: 75px 0px;
    }
    .admin-panel{
        padding: 40px 0px;
        background: #424650;
    }
</style>
<div class="outer">
    <div class="middle">
        <div class="inner">
            <div class="dashboard">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel admin-panel">
                            <img style="margin: 0 auto;" width="225" class="img-responsive" src="<?= Yii::$app->homeUrl; ?>img/logo.png" alt="logo"/>
                            <h4 style="text-align: center;font-weight: 600;text-transform: uppercase;font-size: 20px;color: #dcdbdb;margin: 18px 0px;margin-top: 35px;">Administrator Control Panel</h4>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
