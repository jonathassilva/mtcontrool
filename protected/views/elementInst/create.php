<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this ElementInstController */
/* @var $model ElementInst */
?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">New Elements Instance</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Element Instance'=>array('admin'),
	'New Element Instance',
    ),
)); ?>


<?php $this->renderPartial('_form', array(
						   //'model'=>$model,
						   'arrayModels'=>$arrayModels,
						   'arrayElementType'=>$arrayElementType,
						   'flag'=>'create',
						   )); ?>