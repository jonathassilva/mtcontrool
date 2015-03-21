<?php
/* @var $this RunsController */
/* @var $model Runs */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial;">New Run</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >

<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Runs'=>array('index'),
	'New Run',
    ),
)); ?>


<?php

	if($plataforma == "Android"){
		$this->renderPartial('_questAndroid',array('idRuns'=>$id));
	}else if($plataforma == "iOS") {
		$this->renderPartial('_questIOS', array('idRuns'=>$id));
        }else if($plataforma == "Windows Phone"){
                $this->renderPartial('_questWP', array('idRuns'=>$id));
        }
        
      
	 
?>