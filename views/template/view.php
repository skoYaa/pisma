<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Template */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Templates', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="template-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izmjeni', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Izbriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="http://localhost/pisma/web/index.php?r=template/index" class="btn btn-info" role="button">Nazad</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',
            'name',
            'description',
            'created_at',
            'updated_at',
            'active',
            'account_id',
        ],
    ]) ?>

</div>
