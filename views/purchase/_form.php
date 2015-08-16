<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <h4>Nacin placanja: <?php $model1=  \app\models\PaymentMethod::find()->where(['id'=>$model->payment_method_id])->one(); echo $model1->payment_method; ?></h4>

    <h4>Paket: <?php $model2= \app\models\Package::find()->where(['id'=>$model->package_id])->one(); echo $model2->name; ?></h4>

    <h4><?= "Datum narudzbe: ". $model->purchase_date ?></h4>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'paid_date')->widget(
    DatePicker::className(), [
        'inline' => FALSE, 
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'startDate' => date('2000-01-01')
        ]
]);?>

    
    <?= $form->field($model, 'start_date')->widget(
    DatePicker::className(), [
        'inline' => FALSE, 
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'startDate' => date('2000-01-01')
        ]
]);?>

    
    <?= $form->field($model, 'end_date')->widget(
    DatePicker::className(), [
        'inline' => FALSE, 
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'startDate' => date('2000-01-01')
        ]
]);?>

    <?= $form->field($model, 'purchase_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
