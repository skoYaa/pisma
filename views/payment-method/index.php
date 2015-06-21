<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentMethodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metod plaćanja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-method-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novi metod plaćanja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [ 'attribute' => 'payment_method', 'label'=>'Metod plaćanja','format' => 'raw', 'value' => function($data){return "<a href=\"?r=payment-method%2Fupdate&id={$data->id}\">{$data->payment_method}</a>";}],
           // 'payment_method',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
