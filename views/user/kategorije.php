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
          class="block-title align-center gray well well-small"
            <h2 class="page-header">Podkategorije</h2>
            <div class="row" ><div class="block-title align-center gray well well-small">
                <?php

                 //$models= $kat;
                $var=$_GET['c'];
                $models = Category::getSubCategories($var);
                     foreach($models as $model) { 
                        ?>
                        <a href="http://localhost/pisma/web/index.php?r=user/kategorija&c=<?=$model->id?>" class="btn btn-primary" style="background-color: white; color: black"><?= $model->name ?></a>
                     <?php }
               
                ?>
            </div></div>
            <div class="row">
                <div class="col-lg-12" >
                    <h2 class="page-header">Pisma</h2>
                    <h5 class="block-title align-center gray well well-small" >Pisma</h5>
                    <div class="row" style="padding-top: 40px;">

                    <div class="views-row views-row-1">
                    <div class="thumbnail no-padding clearfix margin-bottom-big">
                  <div class="clearfix border-bottom no-margin-bottom padding project-header">
                    <div class="pull-right">
                    </div>
                    <h4 class="template-list-title"><a href="?r=user/say&message=Hello+World">Basic Resume</a></h4>
                     <p>This is a close (not exact) copy of my engineering resume.
                </p><p>Resumes are made to be very simple, in fact, they should only be one page for professional positions. In general, a resume is used to get a 'bite' from a company.  The company you apply at will use the resume as a disqualifer so that they don't need to look through so many applications for a position.
                </p><p>I hope this works well for you!  If this resume helps you to get a job, please consider donating a small sum to help me pay for college.<br>
                Paypal: bruce [dot] schaller [at] gmail [dot] com</p>
                   </div>
                  
                  <div class="clearfix padding border-bottom no-margin-bottom body">
                    
                    <div><strong class="views-label views-label-author">Author: </strong><span class="field-content">bruceschaller</span></div>    
                    <div><strong class="views-label views-label-field-template-category">Category: </strong>Personal: Correspondence</div>    
            
                 </span></div>    
                  </div>
                  
                </div>
                  </div>

                    </div>
                </div>



            </div>
        </div>
  </div>
       
   
