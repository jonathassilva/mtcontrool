<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this TestContextController */
/* @var $model TestContext */
?>

<?php
$this->breadcrumbs=array(
	'Test Contexts'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List TestContext', 'url'=>array('index')),
	array('label'=>'Create TestContext', 'url'=>array('create')),
	array('label'=>'Update TestContext', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete TestContext', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestContext', 'url'=>array('admin')),
);
?>

<h1>View TestContext #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'ID',
		'ID_USER',
		'ID_APP',
		'ID_PLATFORM',
		'ID_DEVICE',
		'DESCRIPTION',
	),
)); ?>