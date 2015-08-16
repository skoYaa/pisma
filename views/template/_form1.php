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

            <?php 
                $tagovi=$model->templateTags;
            foreach ($tagovi as $key ) {
                print_r($key->id);
            }
             ?>

        </div>
        <div class="col-md-6">
            
            <?php
            $model->account_id = Yii::$app->user->identity->id; //pokupi vrijednost id aktivnog accounta
            echo Html::activeHiddenInput($model, 'account_id'); //unese ga u polje pomocu hidden inputa.
            ?>

            <?= $form->field($model, 'active')->label('Active')->radioList(['0' => 'Neaktivan', '1' => 'Aktivan']); ?>
            <?php 
            $kategorija = Category::find()->all();
            $options=\yii\helpers\ArrayHelper::map($kategorija, 'id', 'name');
//            foreach $kategorija as kate:
//                if ($kate->paremt !== null);]
//                draw checkbox
//            endforeach;
//                if (!empty($kate->subCategory))
//                    foreach $kate->sub
//                        draw subkate
//            endforeach;
            ?> <div id='cat' > <?php echo $form->field($kategorija[0], '[]id')->label('Kategorija')->checkboxList($options, ['unselect'=>NULL]); ?></div>
         
            <?php 
            $tagovi = Tag::find()->all();
            $options2=\yii\helpers\ArrayHelper::map($tagovi, 'id', 'name');
            ?> <div id='cat2' > <?php echo $form->field($tagovi[0], '[]id')->label('Tag')->checkboxList($options2, ['unselect'=>NULL]); ?> </div>
         
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

        $(document).ready(function(){
            //alert("DA VIDIMO");try

    if("<?php echo $_GET['id']; ?>")
        var st = "<?php echo $_GET['id']; ?>";
        //alert(st);



  $.ajax({
            method: "GET",
            url: "http://localhost/pisma/web/index.php?r=category/test",
            data: { name: st},

            success: function(data){
              //alert(data);
              array_data = JSON.parse(data);
                var i = 0;
                var len = array_data.length;
                $("#cat input:checkbox[value=1]").prop("checked",false);
                for (; i < len; i++) {
                   $("#cat input:checkbox[value="+array_data[i]+"]").prop("checked",true);
             
                }
              
            },
            
          });

    $.ajax({
            method: "GET",
            url: "http://localhost/pisma/web/index.php?r=category/test2",
            data: { name: st},

            success: function(data){
              //alert(data);
              $("#cat2 input:checkbox[value=1]").prop("checked",false);
              array_data = JSON.parse(data);

                var i = 0;
                var len = array_data.length;
                $("#cat2 input:checkbox[value=1]").prop("checked",false);
                for (; i < len; i++) {
                   $("#cat2 input:checkbox[value="+array_data[i]+"]").prop("checked",true);
             
                }
              
            },
            
          });

});
        </script>