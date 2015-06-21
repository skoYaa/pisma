<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pisma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo pismo', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'text',
            [ 'attribute' => 'name', 'label'=>'Naslov','format' => 'raw', 'value' => function($data){return "<a href=\"?r=template%2Fupdate&id={$data->id}\">{$data->name}</a>";},
],
            [ 'attribute' => 'description', 'label'=>'Opis'],
            [ 'attribute' => 'created_at', 'label'=>'Datum dodavanja'],
            [ 'attribute' => 'updated_at', 'label'=>'Datum izmjena'],
            [ 'attribute' => 'active', 'label'=>'Aktivno pismo'],
            [ 'attribute' => 'account_id', 'label'=>'Dodao/izmjenio','value' => 'account.user_name'],
            //'name',
            //'description',
            //'created_at',
            //'updated_at',
            //'active',
            //'account_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
