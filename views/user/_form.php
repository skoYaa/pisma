<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'first_name')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'user_name')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'pass')->passwordInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'repeatpassword')->passwordInput(['maxlength' => 50]) ?>
           

        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'adress')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'city')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'country')->label('Država')->dropDownList(['Bosna i Hercegovina' => 'Bosna i Hercegovina', 'Hrvatska' => 'Hrvatska', 'Srbija' => 'Srbija']); ?>

            <?= $form->field($model, 'company_name')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'pdv_number')->textInput() ?>


        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Potvrdi' : 'Potvrdi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=user/index" class="btn btn-info" role="button">Poništi</a>

    </div>  

    <?php ActiveForm::end(); ?>

</div>
