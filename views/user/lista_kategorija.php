<?php

use app\models\Category;
?>


    

    <div class="list-group">
        <?php
        $models = Category::getItems();

        foreach ($models as $model) {
            ?>
            <a href="http://localhost/pisma/web/index.php?r=user/kategorija&c=<?= $model->id ?>" class="list-group-item"><?= $model->name ?></a>
            <?php
        }
        ?>

    </div>


