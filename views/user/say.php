<?php
use yii\helpers\Html;
use app\models\CategoryTemplate;
?>

<html>

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
    <div><strong class="views-label views-label-field-template-application">Application: </strong>Writer</div>
    <div><strong class="views-label views-label-field-template-license">License: </strong><span class="field-content"> <p>This template is hereby under the GPL, version 2 or later.  Even so, please contribute to the author if this helps you get a job.</p>
 </span></div>    
  </div>
  
  <div class="padding">
    <i class="icon icon-calendar"></i> 11 April, 2009 - 00:48    <!-- - <i class="icon icon-ok-sign"></i>  -->
      <i class="icon icon-download"></i> <b>Downloads:</b>
      Week: 2.996      - Month: 12.212      - Year: 157.059    
         - <a target="_blank" href="http://sourceforge.net/projects/aoo-templates/files/1312/stats/timeline?dates=2015-07-01+to+2015-07-15">Timeline</a> 
  </div>

</div>
  </div>

	<div style="padding-bottom:10px;"></div>


	
	
	 <h2 style="color:LightBlue;">Download Templata Pisma:</h2>
	<p><a class="btn btn-primary" onclick="#" href="#"> Download .zip </a> 
	<a class="btn btn-primary" onclick="#" href="#"> Download .PDF </a></p>
  <a href="http://localhost/pisma/web/index.php?r=user/kategorija&c=1" class="btn btn-info" role="button">Nazad</a>
				
		
</div></div></div>
</html>