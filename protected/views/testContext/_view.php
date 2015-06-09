<?php
/* @var $this TestContextController */
/* @var $data TestContext */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USER')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_APP')); ?>:</b>
	<?php echo CHtml::encode($data->ID_APP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PLATFORM')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PLATFORM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_DEVICE')); ?>:</b>
	<?php echo CHtml::encode($data->ID_DEVICE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />


</div>