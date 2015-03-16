<?php
/* @var $this PlatformsController */
/* @var $model Platforms */
?>



<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        


  <div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Update Platforms <?php echo $model->name; ?></h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
      'Platforms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
    ),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>