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
                    
                    ['label' => 'Account', 'url' => ['/account/index']],
                    ['label' => 'Payment Method', 'url' => ['/payment-method/index']],
                    ['label' => 'Paketi', 'url' => ['/package/index']],
                    ['label' => 'Kategorije', 'url' => ['/category/index']],
                    ['label' => 'Template', 'url' => ['/template/index']],
                    ['label' => 'Tagovi', 'url' => ['/tag/index']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/admin/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->user_name . ')',
                            'url' => ['/admin/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Administracija',
                               'url' => ['/admin/index'] ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
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
