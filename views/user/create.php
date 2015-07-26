<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Account */

$this->title = 'Kreiranje računa';
//$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container" style="padding-top: 40px; float: left">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i></a>
                </li>
                <li class="active">Registracija</li>
            </ol>
        <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
    </div>
    </div>
</div>
