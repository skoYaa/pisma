<?php
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
$("#test").slideUp(1000).delay(1000).slideDown(1000);

});
</script>

        
</head>
<?php

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="container" style="padding-top: 40px;" >

    <div  class="row">
        <div class="col-md-9">
    <?php
    if(!isset($_GET['q'])){ ?>
            
            <div class="slider">
                <img src="img/1.jpg" />
                <img src="img/2.jpg" />
                <img src="img/1.jpg" />
            </div>
        
        <?php
            } ?>
    <div class="row" style="padding-top: 40px;">
        <?php
        if(isset($_GET['q'])){
            //$models = Category::getItemss($_GET['q']);
            $models = Template::getTemplates($_GET['q']);
        }else{
            
            $models = Template::randomItems();
            //$models = Category::getItems();
        }
            foreach($models as $model) { 
               ?>

               <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-envelope-square fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4><?= $model->name ?></h4>
                        <p><?=  $model->description ?></p>
                        <a href="http://localhost/pisma/web/index.php?r=user/say&message=<?= $model->name?>" class="btn btn-primary">Vise</a>
                    </div>
                </div>
            </div>

            <?php
        
    }
        ?>
    </div></div>
        <div class="col-md-3">
            <?php echo $this->render('lista_kategorija'); ?>
        </div></div>

    <div id="test" class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Paketi</h2>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <img src="img/paket_mini.png" alt="mini">
                </div>
                <div class="panel-body">
                    
                    
                    <a href="http://localhost/pisma/web/index.php?r=user/paket1" class="btn btn-primary btn-lg">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <img src="img/paket_midi.png" alt="mini">
                </div>
                <div class="panel-body">
                    
                    
                    <a href="#" class="btn btn-primary btn-lg">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <img src="img/paket_maxi.png" alt="mini">
                    <!--<span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                    </span> -->
                </div>
                <div class="panel-body">
                    
                    
                    <a href="#" class="btn btn-primary btn-lg">Kupi</a>
                </div>
            </div>
        </div>
    </div></div>

    