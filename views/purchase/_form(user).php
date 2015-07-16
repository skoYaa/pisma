<?php
//namespace app\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $form yii\widgets\ActiveForm */

?>
<script type="text/javascript">

function checkboxlimit(checkgroup, limit){
    var checkgroup=checkgroup
    var limit=limit
    for (var i=0; i<checkgroup.length; i++){
        checkgroup[i].onclick=function(){
            var checkedcount=0
            for (var i=0; i<checkgroup.length; i++)
                checkedcount+=(checkgroup[i].checked)? 1 : 0
            if (checkedcount>limit){
                alert("You can only select a maximum of "+limit+" checkboxes")
                this.checked=false
            }
        }
    }
}

</script>

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




                <?php 
                use app\models\Package;
                $packages= Package::find()->all();

            //use yii\helpers\ArrayHelper;
                $listData=ArrayHelper::map($packages,'id','name','package_price');

                echo $form->field($model, 'package_id')->dropDownList(
                    $listData, 
                    ['prompt'=>'Izaberi...']); 
                    ?>


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

            <?php 
/*
            $pack= Package::find()->where(['id'=> $model->package_id])->one();

            for($x=0; $x< $pack; $x++){
                ?>
                <input type="text" name="name"><br>
                <?php
            } */
            ?>
            
                <p>Izaberi kategorije ispod:</p>
                <form id="world" name="world">

                <?php
                use app\models\Category;
                $categories2 = Category::find()->all();
                foreach ($categories2 as $cat) {
                    ?>
                    <input type="checkbox" name= "categories"/> <?= $cat->name ?><br />
                    <?php
                }
                ?>
                

                </form>

                <script type="text/javascript">

                //Syntax: checkboxlimit(checkbox_reference, limit)
                checkboxlimit(document.forms.world.categories, 3)

                </script>
            
        <p></p>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

                <?php ActiveForm::end(); ?>
</div>
