<?php
/* @var $this RunsController */
/* @var $model Runs */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        


   <div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Update Runs <?php echo $model->id; ?></h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
      'Runs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
    ),
)); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>