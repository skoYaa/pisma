<?php
namespace app\models;

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">


    <div class="container">

        <?php 
        
                
        if(isset($_GET['q'])){
            $qu = $_GET['q'];
    }else{
        $qu=NULL;
    }
        if($qu!=NULL){

            
        }
        else {
        $models = Category::find()->where()->all();            
        }
        //$models = Category::find()->all(); 
        foreach($models as $model) {
    //    $items[] = ['label' => $model->name ,'url' => '#','icon' => 'heart','items' => Category::getItemss($model->id),];
            ?>
           
            <div class="col-sm-3">
            
                            <div class="box">
                                <div class="box-gray aligncenter">
                                    <h4><?= $model->name ?> </h4>
                                    <div class="icon">
                                    <i class="fa fa-envelope fa-3x"></i>
                                    </div>
                                    <p>
                                     <?= $model->description ?>
                                    </p>
                                        
                                </div>
                                <div class="box-bottom">
                                    <a href= <?= "index.php?r=user/index&name=".$model->name  ?> >Vise...</a>
                                    
                                </div>
                                 </div>
                          
                            
                           

                        

            <?php /*
            <div class='panel panel default'>
                <div class='panel-heading'><h4><a href='#'><?= $model->name ?> </a></h4></div>
                <div class= 'panel-body'><?= $model->description ?></div>
            </div>
                */ ?>

            </div>

            <?php

        }
        ?>



    </div>
