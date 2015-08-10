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

            <?= $form->field($model, 'repeatpassword')->textInput(['maxlength' => 50]) ?>


        </div>

        <div class="col-md-6">

            <?= $form->field($model, 'phone')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'adress')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'city')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'country')->label('Država')->dropDownList(['Bosna i Hercegovina' => 'Bosna i Hercegovina', 'Hrvatska' => 'Hrvatska', 'Srbija' => 'Srbija']); ?>

            <?= $form->field($model, 'company_name')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'pdv_number')->textInput() ?>


            <div class="row">
                <div class="col-md-6">
                    <?php $form->field($model, 'status')->label('Status')->radioList(['0' => 'Neaktivan', '1' => 'Aktivan']); ?>
                </div>

                <div class="col-md-6">
                    <?php $form->field($model, 'administrator')->label('Administrator')->radioList(['0' => 'Ne', '1' => 'Da']); ?>
                </div>
            </div>

        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Potvrdi' : 'Potvrdi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=account/index" class="btn btn-info" role="button">Poništi</a>

    </div>  

    <?php ActiveForm::end(); ?>



<script src="http://code.jquery.com/jquery-latest.js"
        type="text/javascript"></script>
<script >

        $(document).ready(function(){
            document.getElementById("account-repeatpassword").value=document.getElementById("account-pass").value;
            document.getElementById("account-repeatpassword").type='password';
            });
</script>