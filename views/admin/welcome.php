<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\grid\GridView;

/*
 *  * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>





<div class="row">
    <div class="col-md-7">
        <h3>Zadnji kreirani korisnici</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider1,
            //'filterModel' => $searchModel,
            
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                [ 'attribute' => 'first_name', 'label' => 'Ime'],
                [ 'attribute' => 'last_name', 'label' => 'Prezime'],
                [ 'attribute' => 'company_name', 'label' => 'Firma'],
                [ 'attribute' => 'user_name', 'label' => 'Korisničko ime'],
                
            ],
        ]);
        ?>

    </div>

    <div class="col-md-5">
        <h3>Zadnje naruđbe</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider2,
            //'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                [ 'attribute' => 'account_id', 'label' => 'Korisnik', 'value' => 'account.user_name'],
                [ 'attribute' => 'package_id', 'label' => 'Paket', 'value' => 'package.name'],
                [ 'attribute' => 'purchase_date', 'label' => 'Datum naruđbe'],
                [ 'attribute' => 'paid', 'label' => 'Platio'],
            ],
        ]);
        ?>

    </div>
</div>

<?php ?>