<?php
/* @var $this ElementInstController */
/* @var $data ElementInst */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ELEMENT')); ?>:</b>
	<?php echo CHtml::encode($data->ID_ELEMENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TEST_CONTEXT')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TEST_CONTEXT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ELEMENT_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->ELEMENT_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('START_PARAM')); ?>:</b>
	<?php echo CHtml::encode($data->START_PARAM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('END_PARAM')); ?>:</b>
	<?php echo CHtml::encode($data->END_PARAM); ?>
	<br />


</div>