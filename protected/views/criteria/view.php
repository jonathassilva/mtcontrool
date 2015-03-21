<?php
/* @var $this CriteriaController */
/* @var $model Criteria */
?>



<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        



<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">View Criteria - <?php echo $model->name; ?></h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Criterias'=>array('index'),
	$model->name,
    ),
)); ?>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		//'id',
		'num_order',
		'name',
	),
)); ?>