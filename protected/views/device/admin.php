<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this DeviceController */
/* @var $model Device */


?>


<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Manage Devices</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       //'Site'=>array('site/index'),
	'Manage Devices',
    ),
)); 
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'device-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'ID',
		//'ID_BRAND',
		array(
			'header'=>'Model',
			//'filter'=>Brand::model()->forList(),
			'name'=>'DESCRIPTION',
			//'value'=>'$data->iDBRAND->BRAND_NAME'
		),
		array(
			'header'=>'Brand',
			'filter'=>CHtml::listData(Brand::model()->findAll(),'BRAND_NAME', 'BRAND_NAME'),
			'name'=>'ID_BRAND',
			'value'=>'$data->iDBRAND->BRAND_NAME'
		),
		array(
			'header'=>'Platform',
			'filter'=>CHtml::listData(Platforms::model()->findAll(),'name', 'name'),
			'name'=>'ID_PLATFORM',
			'value'=>'$data->iDPLATFORM->name'
		),
		
		//'DESCRIPTION',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{delete}',
		),
	),
)); ?>