<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $model->account_id = Yii::$app->user->identity->id; //pokupi vrijednost id aktivnog accounta
            echo Html::activeHiddenInput($model, 'account_id'); //unese ga u polje pomocu hidden inputa.
            use app\models\PaymentMethod;
            $payments= PaymentMethod::find()->all();

            use yii\helpers\ArrayHelper;
            $listData=ArrayHelper::map($payments,'id','payment_method');

            echo $form->field($model, 'payment_method_id')->dropDownList(
                $listData, 
                ['prompt'=>'Izaberi...']); 
            
                
    ?>
    <div id='target'>
    <?php
    
                use app\models\Package;
                $packages= Package::find()->all();
                $listData=ArrayHelper::map($packages,'id','name');

                echo $form->field($model, 'package_id')->dropDownList(
                    $listData, 
                    ['prompt'=>'Izaberi']);        
    ?>
    </div> 

    <?php
            //use app\models\User;
            $model->purchase_date = 'NOW()'; //pokupi vrijednost 
            echo Html::activeHiddenInput($model, 'purchase_date'); //unese ga u polje pomocu hidden inputa.
    ?>

    <?php
            //use app\models\User;
            $model->paid = 0; //pokupi vrijednost id aktivnog accounta
            echo Html::activeHiddenInput($model, 'paid'); //unese ga u polje pomocu hidden inputa.
    ?>

    <?php
            //use app\models\User;
            $model->paid_date = 'NOW()'; //pokupi vrijednost 
            echo Html::activeHiddenInput($model, 'paid_date'); //unese ga u polje pomocu hidden inputa.
    ?>


    <?php
            //use app\models\User;
            $model->start_date = 'NOW()'; //pokupi vrijednost 
            echo Html::activeHiddenInput($model, 'start_date'); //unese ga u polje pomocu hidden inputa.
    ?>



    <?php
            //use app\models\User;
            $model->end_date = 'NOW()'; //pokupi vrijednost 
            echo Html::activeHiddenInput($model, 'end_date'); //unese ga u polje pomocu hidden inputa.
    ?>


    <?= $form->field($model, 'purchase_price')->textInput() ?>

          <div id='group1'>   
    <?php
                use app\models\Category;
                $kategorija = Category::getItems();
                $options=\yii\helpers\ArrayHelper::map($kategorija, 'id', 'name');
                ?> <div class='checkbox' ><?php echo $form->field($kategorija[0], '[]id')->label('Izaberi kategorije ispod:')->checkboxList($options, ['unselect'=>NULL]); 
    ?></div></div>
    <input type='reset' value='Reset' name='reset' onclick="showCustomer()">
    <h3></h3>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Kupi' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="http://localhost/pisma/web/index.php?r=template/index" class="btn btn-info" role="button">Poništi</a>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="http://code.jquery.com/jquery-latest.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function(){
        
    //alert('radi'); 
    $( "#target" ).change(function() {
        //alert('radi2');
        var str = "";
        
        alert(str);
        //$(".target1").val(str);

   });

  var count = 0;
  var checked = 0;
  function countBoxes() { 
    count = $("input[type='checkbox']").length;
    console.log(count);
  }
  
  countBoxes();
  $(":checkbox").click(countBoxes);
  
  // count checks

  function countChecked() {
      if(checked+5>=count){
          alert("nemozes vise checkirati");
           $(":checkbox").attr("disabled", true);
           
      }else{
         $(":checkbox").removeAttr("disabled"); 
      }
    
    checked = $("input:checked").length; 
    console.log(checked);
      
          
    
  }
  
  countChecked();
  $(":checkbox").click(countChecked);
  $("#restart").click(function(){
    $("input.group1").removeAttr("disabled"); 
    $('input.group1').attr('checked', false);
    checked = 0;
  });
  
  
});

//'<?php echo Yii::$app->request->baseUrl. '/user/pozivanje' ?>'
var httpRequest;
  document.getElementById("ajaxButton").onchange = function() { makeRequest('test.html'); };

  function makeRequest(url) {
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } 
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e) {}
      }
    }

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', url);
    httpRequest.send();    
  }

  function alertContents() {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        alert(httpRequest.responseText);
      } else {
        alert('There was a problem with the request.');
      }
    }
  }
   
</script>