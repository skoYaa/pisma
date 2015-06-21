<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paketi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novi paket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'id',
            [ 'attribute' => 'name', 'label'=>'Paket','format' => 'raw', 'value' => function($data){return "<a href=\"?r=package%2Fupdate&id={$data->id}\">{$data->name}</a>";}],
            [ 'attribute' => 'category_amount', 'label'=>'Količina kategorija'],
            [ 'attribute' => 'package_price', 'label'=>'Cijena'],
            //'name',
            //'category_amount',
            //'package_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
