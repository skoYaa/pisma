<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

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
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <header>
        <?php
            NavBar::begin([
                'brandLabel' => 'Pisma.Ba - Administracija',
                'brandUrl' => ['/admin/index'],
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/admin/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->user_name . ')',
                            'url' => ['/admin/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end(); ?></header>

        
            <div class="container">
            <div class="row">
                <div class="col-lg-2">
                  <?php
            NavBar::begin([
                'options' => [
                    'class' => 'col-lg-12',
                    'style' => 'background-color: grey',
                ]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'col-lg-2 nav nav-pills nav-stacked', 'style' => 'background-color: lightcyan'],
                'items' => [
                    
                    ['label' => 'Account', 'url' => ['/account/index']],
                    ['label' => 'Payment Method', 'url' => ['/payment-method/index']],
                    ['label' => 'Paketi', 'url' => ['/package/index']],
                    ['label' => 'Kategorije', 'url' => ['/category/index']],
                    ['label' => 'Template', 'url' => ['/template/index']],
                    ['label' => 'Tagovi', 'url' => ['/tag/index']],
                    
                ],
            ]);
            NavBar::end();
        ?>  
                </div>
                <div class="col-lg-9 pull-right">
                    <?= $content ?>
                </div>
            </div></div>
            
        
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Leftor d.o.o. <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
