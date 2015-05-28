<?php

use yii\helpers\Html;
use yii\widgets\Block;
use yii\widgets\ContentDecorator;

$this->title = 'Widgets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $this->beginBlock('mojblok', true) ?>
    ...<div>Ovde ide php i html code</div>....
    
    <?php $this->endBlock() ?>

    <?php $this->beginContent('@app/views/layouts/main.php') ?>

    <h3>Ovdje ide neki sadrzaj</h3>

<?php $this->endContent() ?>
   
</div>
