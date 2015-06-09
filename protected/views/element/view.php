<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this ElementController */
/* @var $model Element */
?>

<?php
$this->breadcrumbs=array(
	'Elements'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Element', 'url'=>array('index')),
	array('label'=>'Create Element', 'url'=>array('create')),
	array('label'=>'Update Element', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Element', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Element', 'url'=>array('admin')),
);
?>

<h1>View Element #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'DESCRIPTION',
	),
)); ?>