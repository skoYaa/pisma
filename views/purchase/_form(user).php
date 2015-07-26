<?php
//namespace app\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
            //use app\models\User;
            $model->account_id = Yii::$app->user->identity->id; //pokupi vrijednost id aktivnog accounta
            echo Html::activeHiddenInput($model, 'account_id'); //unese ga u polje pomocu hidden inputa.
            ?>


            <?php 
            use app\models\PaymentMethod;
            $payments= PaymentMethod::find()->all();

            use yii\helpers\ArrayHelper;
            $listData=ArrayHelper::map($payments,'id','payment_method');

            echo $form->field($model, 'payment_method_id')->dropDownList(
                $listData, 
                ['prompt'=>'Izaberi...']); 
            
                ?>



<div id='ajaxButton'>
                <?php 
                use app\models\Package;
                $packages= Package::find()->all();

            //use yii\helpers\ArrayHelper;
                $listData=ArrayHelper::map($packages,'id','name');

                echo $form->field($model, 'package_id')->dropDownList(
                    $listData, 
                    ['prompt'=>'']); 
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

            
             <div> <input class="target1" type="text" name="country" value="Cena" readonly><br></div>
         
                 
                <p>Izaberi kategorije ispod:</p>
                <form class="target">

                <?php
                use app\models\Category;
                $categories2 = Category::find()->all();
                foreach ($categories2 as $cat) {
                    ?>
                    <input type="checkbox" name= "categories" class="group1"/> <?= $cat->name ?><br />
                    <?php
                }
                ?>
                
                <button type="submit" form="form1" value="Submit" onclick="showCustomer()" id="restart">Reset</button>

                </form>

            
        <p></p>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

                <?php ActiveForm::end(); ?>
</div>

<script src="http://code.jquery.com/jquery-latest.js"
        type="text/javascript"></script>

<script>
    $(document).ready(function(){
        
    //alert('radi'); 
    $( ".target" ).change(function() {
        //alert('radi2');
        var str = "";
        var str1="";
        $( "select option:selected" ).each(function() {
          str = $(this).text();
          console.log(str);
        });

        var selected = $(this).val()
/*
        $.ajax({
            method: "GET",
            url: "/pisma/web/index.php?r=user/index",
            data: {
              id: selected 
            },
            success: function(data) {
              str = data;
            }
          }); */





        //alert( "Handler for .change() called."+ str);
        $(".target1").val(str);
    
        //$(".target1").val($pack->package_price);
        
   });
    // get box count///////////////////////////////////////
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
           $("input.group1").attr("disabled", true);
           
      }else{
         $("input.group1").removeAttr("disabled"); 
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