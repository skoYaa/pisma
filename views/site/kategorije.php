<?php

use yii\helpers\Html;
use app\models\Category;
$this->title = 'Kategorije';
?>

<div class="container" style="padding-top: 40px; float: left">
    <div class="row">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li class="active">Kategorije</li>
            </ol></div>


        <div class="col-lg-9">
            <h2 class="page-header">Podkategorije</h2>
            <h2 class="page-header">radi moje</h2>
            <div class="row">

            <h2 class="page-header">radi moje</h2>
                <?php

                 //$models= $kat;
                $var=$_GET['c'];
                $models = Category::getSubCategories($var);
                     foreach($models as $model) { 
                        ?>
                        <a href="#" class="list-group-item"><?= $model->name ?></a>
                     <?php }
               
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12" >
                    <h2 class="page-header">Random pisma</h2>
                </div>
            </div>
        </div>
            
            
                
                
                </div>
            
            
            </div>
       
   
