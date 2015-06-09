<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this ElementController */
/* @var $model Element */
?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">New Element</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Element'=>array('admin'),
	'New Element',
    ),
)); ?>

<!--
<?php //$this->menu=array(
	//array('label'=>'List Element', 'url'=>array('index')),
	//array('label'=>'Manage Element', 'url'=>array('admin')),
//);
?>-->



<?php $this->renderPartial('_form', array('model'=>$model,
										  //'platformsArray'=>$platformsArray
										  )); ?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'element-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'DESCRIPTION',
		/*array(
			'header'=>'Platforms',
			'filter'=>CHtml::listData(PLATFORMS::model()->findAll(),'id', 'name'),
			'name'=>'ID_PLAT',
			'value'=>'$data->platform_list($data->ID)'
		),*/
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{delete}',
		),
	),
)); ?>





