<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Purchase;

$model = new Purchase();
?>
<div class="container" style="padding-top: 40px;">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li class="active">Paketi</li>
            </ol></div>

           
<div class="col-md-6">
                <?php $form = ActiveForm::begin(); ?>

                <?php
                $model->account_id = Yii::$app->user->identity->id; //pokupi vrijednost id aktivnog accounta
                echo Html::activeHiddenInput($model, 'account_id'); //unese ga u polje pomocu hidden inputa.
                ?>
                <div id='target'>
                    <?php

                    use app\models\Package;

$package = Package::find()->where(['name' => "Maxi"])->one();
                    $model->package_id = $package->id;
                    echo Html::activeHiddenInput($model, 'package_id');
                    ?>
                    <h3><b> <?php echo "Paket: " . $package->name; ?> </b></h3>

                </div> 

                <?php
                //use app\models\User;
                $model->purchase_date = \date("Y-m-d H:i"); //pokupi vrijednost 
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


                <?php
                $model->purchase_price = $package->package_price;
                echo Html::activeHiddenInput($model, 'purchase_price');
                ?>
                <h4><b><?php echo "Cijena: " . $package->package_price . " KM"; ?></b></h4>
                <hr>
                <?php

                use app\models\PaymentMethod;

$payments = PaymentMethod::find()->all();

                use yii\helpers\ArrayHelper;

$listData = ArrayHelper::map($payments, 'id', 'payment_method');
                echo $form->field($model, 'payment_method_id')->dropDownList($listData, ['prompt' => 'Izaberi...'])->label('Izeberi metod placanja');
                ?>

            
            
                <input type='reset' value='Reset' name='reset'>
                <h3></h3>
                <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Kupi' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <a href="http://localhost/pisma/web/index.php?r=user%2Findex" class="btn btn-info" role="button">Poništi</a>

                </div></div>
                <div class="col-md-6">
                <?php

                use app\models\Category;

$kategorija = Category::getItems();
                $options = \yii\helpers\ArrayHelper::map($kategorija, 'id', 'name');
                echo $form->field($kategorija[0], '[]id')->checkboxList($options, ['unselect' => NULL])->label('<h3><b>Izaberi kategorije:</b></h3>');
                ?></div>

<?php ActiveForm::end(); ?>

            </div>
        </div>
   

