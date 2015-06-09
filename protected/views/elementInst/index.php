<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this ElementInstController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Element Insts',
);

$this->menu=array(
	array('label'=>'Create ElementInst','url'=>array('create')),
	array('label'=>'Manage ElementInst','url'=>array('admin')),
);
?>

<h1>Element Insts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>