<?php
/* @var $this AppController */
/* @var $model App */
?>



<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">
         <img src="../../images/mobile-128.png" height="70" width="70">
        New App</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Apps'=>array('index'),
	'New App',
    ),
)); ?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>