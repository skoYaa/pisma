<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'name')->textInput(['maxlength' => 50])->label('Ime taga:') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Potvrdi' : 'Potvrdi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=tag/index" class="btn btn-info" role="button">Poništi</a>
    </div>

   



    <?php ActiveForm::end(); ?>

</div>
