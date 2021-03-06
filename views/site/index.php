

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
    <div class="row">
        <div class="col-md-9">
            <div class="slider">
                <img src="img/1.jpg" />
                <img src="img/2.jpg" />
                <img src="img/3.jpg" />
            </div>
        </div></div>
    <div class="row" style="padding-top: 40px;">
        <?php
        if(isset($_GET['q'])){
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
                    <h4>Pismo</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">Vise</a>
                </div>
            </div>
        </div>
            <?php

        }else{
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
                    <h4>Pismo</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">Vise</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Pismo</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">Vise</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Pismo</h4>
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
                        <img class="img-responsive center-block" src="img/MiniV1.png" />
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Mini</h4>
                    <p>5 kategorija</p>
                    <p>Aktivan godinu dana</p>
                    <p>50KM</p>
                    <a href="#" class="btn btn-primary btn-lg" style="background-color:#86A6C9">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <img class="img-responsive center-block" src="img/MediV1.png" />
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Midi</h4>
                    <p>20 kategorija</p>
                    <p>Aktivan godinu dana</p>
                    <p>100KM</p>
                    <a href="#" class="btn btn-primary btn-lg" style="background-color:#86A6C9">Kupi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                        <img class="img-responsive center-block" src="img/MaxiV1.png" />
                    </span>
                </div>
                <div class="panel-body">
                    <h4>Maxi</h4>
                    <p>Neograničen broj kategorija</p>
                    <p>Aktivan godinu dana</p>
                    <p>200KM</p>
                    <a href="#" class="btn btn-primary btn-lg" style="background-color:#86A6C9" >Kupi</a>
                </div>
            </div>
        </div>
    </div></div>
    <?php

    ?>
