<?php
use app\models\Template;
use app\models\Category;
?>


<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="sss/sss.min.js"></script>
<link rel="stylesheet" href="sss/sss.css" type="text/css" media="all">
<script src="js/jssor.js" type="text/javascript"></script>
<script src="js/jssor.slider.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function ($) {
        var options = {
            $DragOrientation: 3,
            $AutoPlay: true,                                    
            $AutoPlayInterval: 4000
        };
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);
    });
</script>

        
</head>
<?php

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="container" style="padding-top: 40px; padding-left: 0px;" >

    <div  class="row">
        <div class="col-md-12">
   
            
           <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 1165px;
        height: 300px;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1165px; height: 300px;
            overflow: hidden;">
            
            <div><img data-u="image" src="img/1.jpg" alt="1"/></div>
            <div><img data-u="image" src="img/2.jpg" alt="2"/></div>
            <div><img data-u="image" src="img/3.jpg" alt="3"/></div>
        </div>

        <!-- Cover Begin -->
        <div style="position:absolute;top:-20px;left:-20px;width:50px;height:47px;background-image:url(img/cover/0001-TL.png)"></div>
        <div style="position:absolute;top:-20px;right:-20px;width:50px;height:47px;background-image:url(img/cover/0001-TR.png)"></div>
        <div style="position:absolute;bottom:-20px;left:-20px;width:50px;height:58px;background-image:url(img/cover/0001-BL.png)"></div>
        <div style="position:absolute;bottom:-20px;right:-20px;width:50px;height:58px;background-image:url(img/cover/0001-BR.png)"></div>

        <div style="position:absolute;top:-20px;left:30px;width:1105px;height:47px;background-image:url(img/cover/0001-T.png)"></div>
        <div style="position:absolute;bottom:-20px;left:30px;width:1105px;height:58px;background-image:url(img/cover/0001-B.png)"></div>
        <div style="position:absolute;top:27px;left:-20px;width:50px;height:235px;background-image:url(img/cover/0001-L.png)"></div>
        <div style="position:absolute;top:27px;right:-20px;width:50px;height:235px;background-image:url(img/cover/0001-R.png)"></div>
        
           </div></div></div>
    <!-- Jssor Slider End -->
        
        
    <div class="row" style="padding-top: 40px;">
        <div class="col-md-9">
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
    </div>
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
                    <img src="img/paket_midi.png" alt="midi">
                </div>
                <div class="panel-body">
                    
                    
                    <a href="http://localhost/pisma/web/index.php?r=user/paket2" class="btn btn-primary btn-lg">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <img src="img/paket_maxi.png" alt="maxi">
                    <!--<span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                    </span> -->
                </div>
                <div class="panel-body">
                    
                    
                    <a href="http://localhost/pisma/web/index.php?r=user/paket3" class="btn btn-primary btn-lg">Kupi</a>
                </div>
            </div>
        </div>
    </div></div>

    

