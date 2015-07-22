<?php

use yii\helpers\Html;
use app\models\Category;
use app\models\Template;
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


        <div class="col-md-9">
            <h2 class="page-header">Categorija: <?php $var= Category::tempCategory($_GET['c']); echo $var->name ;?></h2>
            <h2 class="page-header">Podkategorije:</h2>
            <div class="row" >
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
                    <h2 class="page-header">Pisma:</h2>
                    <!--<h5 class="block-title align-center gray well well-small" ></h5> -->
                    <div class="row" style="padding-top: 40px;">

                    <div class="views-row views-row-1">
                    
                  
                    <?php
                    $models = Template::getItems();
        
                foreach($models as $model) { 
                   ?>
                   <div class="thumbnail no-padding clearfix margin-bottom-big">
                   <div class="clearfix border-bottom no-margin-bottom padding project-header">
                    <h4 class="template-list-title"><a href="?r=user/say&message=<?= $model->name ?>"><?= $model->name ?></a></h4>
                     <p><?= $model->description ?> </p> 
                </div> 
                   
                  
                  <div class="clearfix padding border-bottom no-margin-bottom body">
                    
                    <div><strong class="views-label views-label-author">Autor: </strong><span class="field-content"><?= $model->account_id ?></span></div>    
                    <div><strong class="views-label views-label-field-template-category">Datum: </strong><?= $model->updated_at ?></div>    
            
                 </div>    
                  </div> <?php } ?>
                  
                </div>
                  </div>

                    </div>
                </div>



            </div>
        </div>
  </div>
       
   
