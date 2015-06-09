<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this DeviceController */
/* @var $model Device */
?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Update Device *<?php echo $model->DESCRIPTION; ?> </h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Device'=>array('admin'),
	'Update Device',
    ),
)); ?>


<?php $this->renderPartial('_form', array('model'=>$model,
	                                      'brandsArray'=>$brandsArray,
			                              'platformsArray'=>$platformsArray,)); ?>