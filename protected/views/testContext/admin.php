<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this TestContextController */
/* @var $model TestContext */




Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#test-context-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Manage Test Contexts</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Test Contexts'=>array('index'),
	'Manage',
    ),
)); ?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'test-context-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'ID',
		//'ID_USER',
		array(
			'header'=>'User',
			'filter'=>CHtml::listData(Users::model()->findAll(),'name', 'name'),
			'name'=>'ID_USER',
			'value'=>'$data->iDUSER->name'
		),
		//'ID_APP',
		array(
			'header'=>'App',
			'filter'=>CHtml::listData(App::model()->findAll(),'name', 'name'),
			'name'=>'ID_APP',
			'value'=>'$data->iDAPP->name'
		),
		//'ID_PLATFORM',
		array(
			'header'=>'Platform',
			'filter'=>CHtml::listData(Platforms::model()->findAll(),'name', 'name'),
			'name'=>'ID_PLATFORM',
			'value'=>'$data->iDPLATFORM->name'
		),
		//'ID_DEVICE',
		array(
			'header'=>'Device',
			'filter'=>CHtml::listData(Device::model()->findAll(),'DESCRIPTION', 'DESCRIPTION'),
			'name'=>'ID_DEVICE',
			'value'=>'$data->iDDEVICE->DESCRIPTION'
		),
		'DESCRIPTION',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{delete}',
		),
	),
)); ?>