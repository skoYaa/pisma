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
            <div class="row">
                <?php

                 //$models= $kat;
                $var=$_GET['c'];
                $models = Category::getSubCategories($var);
                     foreach($models as $model) { 
                        ?>
                        <a href="http://localhost/pisma/web/index.php?r=user/kategorija&c=<?=$model->id?>" class="btn btn-primary" style="background-color: white; color: black"><?= $model->name ?></a>
                     <?php }
               
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12" >
                    <h2 class="page-header">Pisma</h2>
                    <div class="row" style="padding-top: 40px;">

               <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-envelope-square fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Pismo</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Vise</a>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
            
            
                
                
                </div>
            
            
            </div>
       
   
