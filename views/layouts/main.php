<?php
//namespace app\models;

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Category;
use yii\helpers\Url;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div id="wrapper">

            <header>
                <nav class="navbar navbar-fixed-top" role="navigation">
                <div class="row" style="background-image: url(img/pozadina.png); background-repeat: no-repeat; background-color: buttonface">
                    <div class="col-md-3">
                        <a href="http://localhost/pisma/web/index.php?r=user%2Findex"> <img src="img/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                           
                            <div style="float: left; padding-top: 10px;">
                            <form class="navbar-form navbar-left" role="search">
                                    <?= Html::beginForm(["user/index"], "GET") ?>
                                      <input type="search" placeholder="" name="q" value="<?= isset($_GET['q']) ? Html::encode($_GET['q']) : '' ; ?>" />
                                      <input type="submit" value="Pretrazi" />
                                    <?= Html::endForm() ?>
                                      <a href="http://localhost/pisma/web/index.php?r=user/advanced"><i class="fa fa-2x fa-gears" style="padding-top: 7px"></i></a>
                            </form></div></div>
                        
                    </div>
                    <div class="col-md-5">
                        <div class="navbar-header navbar-right" style="font-size: 18px; padding-top: 10px; ">
                            <ul class="nav navbar-nav">
                                <li><a href="http://localhost/pisma/web/index.php?r=user/index">Naslovna</a></li>
                                <li><a href="http://localhost/pisma/web/index.php?r=user/about">O nama</a></li>
                                <li><a href="http://localhost/pisma/web/index.php?r=user/contact">Kontakt</a></li>
                                <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<li><a href="http://localhost/pisma/web/index.php?r=user/create">Registracija</a></li>';
                                } else {
                                    $ime = Yii::$app->user->identity->user_name;
                                    echo '<li><a href="http://localhost/pisma/web/index.php?r=purchase/create">Kupovina</a></li>';
                                }
                                if (Yii::$app->user->isGuest) {
                                    echo '<li><a href="http://localhost/pisma/web/index.php?r=user/login">Login</a></li>';
                                } else {
                                    $ime = Yii::$app->user->identity->user_name;
                                    echo '<li><a href="http://localhost/pisma/web/index.php?r=user/logout">Logout(' . $ime . ')</a></li>';
                                }
                                ?>
                            </ul>
                        </div>          
                     </div>
                </div>
                </nav>
            </header>
        </div> 

        <?php /*
          NavBar::begin([
          'brandLabel' => 'Pisma.Ba',
          'brandUrl' => Yii::$app->homeUrl,
          'options' => [
          'class' => 'navbar-brand',

          ],
          ]);
          echo Nav::widget([
          'options' => ['class' => 'nav navbar-nav navbar-right',

          ],
          'items' => [
          ['label' => 'Home', 'url' => ['/site/index']],
          ['label' => 'About', 'url' => ['/site/about']],
          ['label' => 'Contact', 'url' => ['/site/contact']],

          Yii::$app->user->isGuest ?
          ['label' => 'Login', 'url' => ['/site/login']] :
          ['label' => 'Logout (' . Yii::$app->user->identity->user_name . ')',
          'url' => ['/site/logout'],
          'linkOptions' => ['data-method' => 'post']],
          ],
          ]);
          NavBar::end(); */
        ?>


        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <div class="col-md-9">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= $content ?></div>
                
            </div>
        </div>

        <footer>
            <div style="background-image: url(img/footer.png); position: relative; width: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <h5 class="page-header">Kontakt</h5>
                                <address>
                                    <strong><a href="www.leftor.ba">Leftor d.o.o.</a></strong><br>
                                    Atik mahala 2<br>
                                    75 000 Turla</address>
                                <p>
                                    <i class="fa fa-phone"></i> (387) 35 123-456<br>
                                    <i class="fa fa-envelope"></i> email@leftor.ba
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget">
                                <h5 class="page-header">Linkovi</h5>
                                <ul class="link-list">
                                    <li><a href="index.php">Naslovna</a></li>
                                    <li><a href="http://localhost/pisma/web/index.php?r=site/about">O nama</a></li>
                                    <li><a href="http://localhost/pisma/web/index.php?r=site/contact">Kontakt</a></li>
                                    <li><a href="#">Registracija</a></li>
                                    <li><a href="http://localhost/pisma/web/index.php?r=site/login">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget">
                                <h5 class="page-header">Posljednje dodano</h5>
                                <ul class="link-list">
                                    <li><a href="#">Template 1</a></li>
                                    <li><a href="#">Template 1</a></li>
                                    <li><a href="#">Template 1</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget">
                                <h5 class="page-header">Pratite nas na facebook-u</h5>

                                <div class="clear">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row" style="padding-top: 30px;">
                        <div class="col-lg-6">

                            <p>
                                <span style="color: whitesmoke;">&copy; Leftor 2015 </span>
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <ul class="lista">
                                <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div></div>

        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
