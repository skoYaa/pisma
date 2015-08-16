<?php

use yii\helpers\Html;
?>

<div class="container" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-12">
            <?= Html::beginForm(["user/advanced1"], "GET") ?>
            <?= Html::activeInput('text', $searchModel,'text', ['placeholder'=>"Search..."]) ?>
            <input type="submit" name="trazi" value="Pretrazi" />
            <br><br>
            <input type="checkbox" name="naslov" value="name"/>Po naslovu
            <input type="checkbox" name="tekst" value="text"/>U textu
            <input type="checkbox" name="opis" value="description"/>U opisu

            <?= Html::endForm() ?>
        </div>
        <hr>
        <div class="col-md-12">
            <h3>Rezultat</h3>
            <br>
            <?php
            foreach ($models as $model) :
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-envelope-square fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4><?= $model->name ?></h4>
                            <p><?= $model->description ?></p>
                            <a href="http://localhost/pisma/web/index.php?r=user/say&message=<?= $model->name ?>" class="btn btn-primary">Vise</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
