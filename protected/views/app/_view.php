<?php
/* @var $this AppController */
/* @var $data App */
?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />


        
<div class="view">
	
	<?php
	//recuperando o nome do usu�rio do App
	$modelUsers = Users::model()->findByPk($data->id_users);
	?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id'));?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('developer')); ?>:</b>
	<?php echo CHtml::encode($data->developer); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('id_users')); ?>User:</b>
	<?php //echo CHtml::encode($data->id_users);?>
	<?php echo CHtml::encode($modelUsers->name);?>
	<br />
        
        <hr>
</div>
