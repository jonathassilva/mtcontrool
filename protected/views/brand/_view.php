<?php
/* @var $this BrandController */
/* @var $data Brand */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BRAND_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->BRAND_NAME); ?>
	<br />


</div>