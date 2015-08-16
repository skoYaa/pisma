<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Purchase;

$model= new Purchase();

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'account_id',
            'payment_method_id',
            'package_id',
            'purchase_date',
            'paid',
            'paid_date',
            'start_date',
            'end_date',
            'purchase_price',
        ],
    ]) ?>

</div>
