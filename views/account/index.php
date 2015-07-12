<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Account;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Korisnički računi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <p>
        <?= Html::a('Novi korisnik', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //pravljenje linka od imena
            [ 'attribute' => 'user_name', 'label'=>'Korisničko ime', 'format' => 'raw', 
                'value' => function($data){return "<a href=\"?r=account%2Fupdate&id={$data->id}\">{$data->user_name}</a>";}],
            [ 'attribute' => 'first_name', 'label'=>'Ime'],
            [ 'attribute' => 'last_name', 'label'=>'Prezime'],
            [ 'attribute' => 'company_name', 'label'=>'Ime firme'],
            //'user_name',
            //'pass',
            // 'first_name',
            //'last_name',
            // 'company_name',
            // 'email:email',
            // 'phone',
            // 'adress',
            // 'city',
            // 'country',
            [
                'attribute' => 'status', 
                'label'=>'Status',
                'content' => function($model) {
                    if($model->status === 1){
                        return "Aktivan";
                    }
                    else
                    return "Neaktivan";
                },
                'filter'=> Account::get_status_name()
            ],
            [ 
                'attribute' => 'administrator', 
                'label'=>'Administrator',
                'content' => function($model){
                    if($model->administrator === 1){
                        return "Da";
                    }
                    else
                    return "Ne";
                },
                'filter'=> Account::get_admin_name()],
       
            // 'pdv_number',
                        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
