<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'category_amount')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'package_price')->textInput() ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Potvrdi ' : 'Potvrdi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=package/index" class="btn btn-info" role="button">Poništi</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
