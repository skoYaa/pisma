<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Account */


$this->title = $model->user_name;
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izmjeni', ['account/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Izbriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        <a href="http://localhost/pisma/web/index.php?r=account/index" class="btn btn-info" role="button">Nazad</a>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'first_name',
            'last_name',
            'email:email',
            'user_name',
            'pass',
            'phone',
            'adress',
            'city',
            'country',
            'company_name',
            'pdv_number',
            'status',
            'administrator',
            
        ],
    ])
    ?>

</div>
