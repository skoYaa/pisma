<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tagovi';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novi tag', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
                    
            [
             'attribute' => 'name', 'label'=>'Ime taga','format' => 'raw', 'value' => function($data){return "<a href=\"?r=tag%2Fupdate&id={$data->id}\">{$data->name}</a>";},

             'filter'=>  Tag::get_status_name(),
            ],

            
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
