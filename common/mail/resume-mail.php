<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
if (isset($touser) && $touser != '')
    $name = $touser;
else
    $name = '';
?>

<html>
    <head>
        <style>
            .main-content p{
                line-height: 1.8;
            }
            .body{
                font-family: Open Sans !important;
            }
        </style>
    </head>
    <body>
        <div style="border: 1px solid #9E9E9E;padding: 15px 0px;">
            <table border ="0"  class="main-tabl" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:100%">
                            <div class="header" style="padding-bottom: 0px;">
                                <div class="main-header">
                                    <div class="main-header-left">
                                        <?php echo Html::img('https://' . Yii::$app->request->serverName . '/images/logo.png', $options = ['width' => '200px', 'style' => 'margin:0 auto;']) ?>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:100%">
                            <div class="replay-content" style="text-align: justify;padding-right: 50px;padding-left: 50px;">
                                <div class="main-content">
                                    <p>Dear Admin,</p>
                                    <p>A new resume received from cdaudit.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>