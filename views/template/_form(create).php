<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Tag;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Template */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'name')->label('Naslov')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'description')->label('Opis')->textInput(['maxlength' => 200]) ?>

            <?= $form->field($model, 'text')->label('Sadržaj pisma')->textarea(['maxlength' => 1000], ['rows' => '6']) ?>


        </div>
        <div class="col-md-6">
            
            <?php
            $model->account_id = Yii::$app->user->identity->id; //pokupi vrijednost id aktivnog accounta
            echo Html::activeHiddenInput($model, 'account_id'); //unese ga u polje pomocu hidden inputa.
            ?>

            <?= $form->field($model, 'active')->label('Active')->radioList(['0' => 'Neaktivan', '1' => 'Aktivan']); ?>
               <h2>Kategorije:</h2><div id='cat' >
            <?php 
            $kat = Category::getItems();
            foreach ($kat as $key ) {
                $kategorija=Category::getSubCategories($key->id);
                array_unshift($kategorija,$key);
            echo $key->name.' :';
            $options=\yii\helpers\ArrayHelper::map($kategorija, 'id', 'name');

            ?><?php if(! empty($kategorija )) echo $form->field($kategorija[0], '[]id')->label(false)->checkboxList($options, ['unselect'=>NULL]); ?>
          <hr>
          <?php } ?>
          </div>
          <h2>Tagovi:</h2>
            <?php 
            $tagovi = Tag::find()->all();
            $options2=\yii\helpers\ArrayHelper::map($tagovi, 'id', 'name');
            ?> <div id='cat2' > <?php echo $form->field($tagovi[0], '[]id')->label(false)->checkboxList($options2, ['unselect'=>NULL]); ?> </div>
         
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Potvrdi' : 'Potvrdi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=template/index" class="btn btn-info" role="button">Poništi</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="http://code.jquery.com/jquery-latest.js"
        type="text/javascript"></script>
<script >
    $("#cat input:checkbox ").prop("checked",false);
    $("#cat2 input:checkbox ").prop("checked",false);
</script>
