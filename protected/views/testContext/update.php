<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
	
<?php
/* @var $this TestContextController */
/* @var $model TestContext */
?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Update Test Context *<?php echo $model->iDAPP->name; ?> </h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Test Contexts'=>array('admin'),
	'Update Test Context',
    ),
)); ?>


<?php $this->renderPartial('_form', array('model'=>$model,
									      'appsArray'=>$appsArray,
										  'platformsArray'=>$platformsArray,
										  'devicesArray'=>$devicesArray,)); ?>