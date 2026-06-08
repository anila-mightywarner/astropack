<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section id="sucess_msg">
    <div class="logo_sec">
        <a href="#!" class="logo"><img src="<?= Yii::$app->homeUrl; ?>assets/images/logo.png" class="img-fluid" alt="logo"/></a>
    </div>
    <div class="cntnt_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mauoto">
                    <div class="msg_sec">
                        <img src="<?= Yii::$app->homeUrl; ?>assets/images/success.png" alt="image" class="img-fluid"/>
                    </div>
                    <?= Html::a('Back to home', ['/site/index'], ['class' => 'home_btn']) ?>
                </div>
            </div>
        </div>
    </div>
</section>
