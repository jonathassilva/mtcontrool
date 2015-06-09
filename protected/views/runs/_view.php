<?php
/* @var $this RunsController */
/* @var $data Runs */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<?php 
$plataforma = Platforms::model()->findByPk($data->id_platform);
$app = App::model()->findByPk($data->id_app);

$userId = Yii::app()->user->id;
?>

<?php echo CHtml::encode($app->name);?>


<div class="well">

	<?php echo CHtml::link('View Dashboard',array('view','id'=>$data->id),array('class'=>'btn')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_app')); ?>:</b>
	<?php echo CHtml::encode($app->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_platform')); ?>:</b>
	<?php echo CHtml::encode($plataforma->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changelog')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('id_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_order); ?>
	<br />
        
        <hr>
</div>