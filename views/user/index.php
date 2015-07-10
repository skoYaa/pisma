<?
use app\models\Template;
use app\models\Category;
?>


<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="sss/sss.min.js"></script>
<link rel="stylesheet" href="sss/sss.css" type="text/css" media="all">

<script>
jQuery(function($) {
$('.slider').sss();
});
</script>
</head>
<?php

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="container" style="padding-top: 40px;">
    <?php
    if(!isset($_GET['q'])){ ?>
    <div class="row">
        <div class="col-md-9">
            <div class="slider">
                <img src="img/1.jpg" />
                <img src="img/2.jpg" />
                <img src="img/3.jpg" />
            </div>
        </div></div>
        <?php
            } ?>
    <div class="row" style="padding-top: 40px;">
        <?php
        if(isset($_GET['q'])){
            $models = Category::getItemss($_GET['q']);
            //$models = Template::getTemplates($_GET['q']);
        }else{
            
            //$models = Template::getTemplates();
            $models = Category::getItems();
        }
            foreach($models as $model) { 
               ?>

               <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-envelope-square fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4><?= $model->name ?></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Vise</a>
                    </div>
                </div>
            </div>

            <?php
        
    }
        ?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Paketi</h2>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Paket 1</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Paket 2</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Paket 3</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">Kupi</a>
                </div>
            </div>
        </div>
    </div></div>
    <?php

    ?>