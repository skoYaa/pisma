<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="row">
    <div class="col-md-3">

        <h3>Novi korisnici</h3>

        <?php
        foreach ($model as $d) {?>
            <a href="?r=account%2Fview&id=<?= $d->id; ?>"> <?php echo $d->user_name; ?></a>
            <br>
        <?php }
        ?>
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-2">

      
    </div>
</div>

<?php



?>