<?php

use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="jumbotron">
  <h1>Pozdrav <?php echo Yii::$app->user->identity->user_name; ?></h1>
 
  <p><a class="btn btn-primary btn-lg" href="http://localhost/pisma.ba/pisma/web/index.php?r=account/index" role="button">Nastavi</a></p>
</div> 
        
        