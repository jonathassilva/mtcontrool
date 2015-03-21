<?php
/* @var $this TestCaseController */
/* @var $data TestCase */
?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num')); ?>:</b>
	<?php echo CHtml::encode($data->num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('required')); ?>:</b>
	<?php echo CHtml::encode($data->required); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('steps')); ?>:</b>
	<?php echo CHtml::encode($data->steps); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_characteristic')); ?>:</b>
	<?php echo CHtml::encode($data->id_characteristic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_criteria')); ?>:</b>
	<?php echo CHtml::encode($data->id_criteria); ?>
	<br />

	*/ ?>
<hr>
</div>