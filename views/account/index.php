<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Korisnički računi';
//$this->params['breadcrumbs'][] = $this->title;
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
            'user_name',
            //'pass',
            'first_name',
            'last_name',
            'company_name',
            // 'email:email',
            // 'phone',
            // 'adress',
            // 'city',
            // 'country',
            'status',
            'administrator',
            // 'pdv_number',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
