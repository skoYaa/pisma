<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategorije';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova kategorija', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'id',
            [ 'attribute' => 'name', 'label'=>'Kategorija','format' => 'raw', 'value' => function($data){return "<a href=\"?r=category%2Fupdate&id={$data->id}\">{$data->name}</a>";}],
            [ 'attribute' => 'description', 'label'=>'Opis'],
            [ 'attribute' => 'parent_category', 'label'=>'Nadređena kategorija'],
            //ispis ko je dodao ili izmjenio kategoriju, a ne ispis njegovog id broja
            [ 'attribute' => 'account_id', 'label'=>'Dodao/izmjenio', 'value' => 'account.user_name'],
            //'name',
            //'description',
            //'parent_category',
            //'account_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
