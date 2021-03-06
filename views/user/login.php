<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="padding-top: 40px;">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li class="active">Login</li>
            </ol>


            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
            ]);
            ?>

            <?= $form->field($model, 'username') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?=
            $form->field($model, 'rememberMe', [
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ])->checkbox()
            ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-12">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <div class="alert">
                <p>Ako nemate nalog <a href="http://localhost/pisma/web/index.php?r=user/create"><span>REGISTRUJ</span></a> se</p>
            </div>

        </div>
    </div>
</div>
