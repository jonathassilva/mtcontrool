<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this TestContextController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Test Contexts',
);

$this->menu=array(
	array('label'=>'Create TestContext','url'=>array('create')),
	array('label'=>'Manage TestContext','url'=>array('admin')),
);
?>

<h1>Test Contexts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>