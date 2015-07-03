<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => 50]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'parent_category')->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(),'id','name'),['prompt'=>'Izaberi nadredjenu kategoriju']) ?>
             <?php // $form->field($model, 'parent_category')->dropDownList([1 => "A", 2 => "B", "podkat" => [3 => "C", "pod2" => [5 => "D"]]],['prompt'=>'Izaberi nadredjenu kategoriju']) ?>

            <?php
            $model->account_id = Yii::$app->user->identity->id; //pokupi vrijednost id aktivnog accounta
            echo Html::activeHiddenInput($model, 'account_id'); //unese ga u polje pomocu hidden inputa.
            ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Potvrdi' : 'Potvrdi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=category/index" class="btn btn-info" role="button">Poništi</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
