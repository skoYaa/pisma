<?php

use yii\helpers\Html;
use app\models\CategoryTemplate;
use app\models\Tag;
?>



<div class="col-lg-9">
                <div style="color:LightBlue; overflow: hidden;"><h2><?= "$model->name";?></h2></div>
				<div style="color:black; overflow: hidden;"><hr></div>
	<div id="main" class="page clearfix">			 
	<div id="content" class="block-title align-center gray well well-small">
					    			
	<div class="views-row views-row-1">
    <div class="thumbnail no-padding clearfix margin-bottom-big">
  <div class="clearfix border-bottom no-margin-bottom padding project-header">
    <div class="pull-right">
        </div>
    <h4 class="template-list-title"><a href="/en/template/basic-resume-4"><?= $model->name ?></a></h4>
       <?= $model->text ?>
   </div>
  
  <div class="clearfix padding border-bottom no-margin-bottom body">
    <div class="pull-right"><img class="thumbnail" src="http://templates.openoffice.org/sites/default/files/styles/thumbnail/public/template_images/1312_thumbnail.png?itok=FOt6iU9l"></div>
    <div><strong class="views-label views-label-author">Autor: </strong><span class="field-content"><?= $model->account_id?></span></div>    
     <div><strong class="views-label views-label-field-template-category">Category: </strong><?php echo $ime=CategoryTemplate::getCategoryfromTemplate($model->id); ?></div>   
    <div><strong class="views-label views-label-field-template-application">Application: </strong>PISMA.BA</div>
    <div><strong class="views-label views-label-field-template-license">Tagovi: </strong><span class="field-content"> 
      <p>   
        <?php $model2 = Tag::getTags($model->id) ;
          foreach ($model2 as $mod) { ?>
          <button type="button" class="btn btn-default"><?= $mod->name ?></button>
          <?php
          }

      ?></p>
 </span></div>    
  </div> 
  

</div>
  </div>

	<div style="padding-bottom:10px;"></div>


	
	
	 <h2 style="color:LightBlue;">Download Templata Pisma:</h2>
	<p><a class="btn btn-primary" onclick="#" href="#"> Download .zip </a> 
	<a class="btn btn-primary" onclick="#" href="#"> Download .PDF </a></p>
  <a href="http://localhost/pisma/web/index.php?r=user/kategorija&c=1" class="btn btn-info" role="button">Nazad</a>
				
		
</div></div></div>



