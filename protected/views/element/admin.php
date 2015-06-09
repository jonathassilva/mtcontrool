<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
	

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Manage Elements</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       //'Site'=>array('site/index'),
	'Manage Elements',
    ),
)); ?>


<!--
<?php if(Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success" align="center">
		<p class="soc-block"> <?php echo "Success."; ?></p>
	</div>
<?php elseif(Yii::app()->user->hasFlash('error')): ?>
	<div class="flash-error" align="center">
		<p class="soc-block"> <?php echo "Fail."; ?></p>
	</div>
<?php endif; ?>


</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'element-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'ID',
		'DESCRIPTION',
		array(
			'header'=>'Platforms',
			'filter'=>CHtml::listData(PLATFORMS::model()->findAll(),'id', 'name'),
			'name'=>'ID_PLAT',
			'value'=>'$data->platform_list($data->ID)'
		),
		array(
			'header'=>'Devices',
			'filter'=>CHtml::listData(Device::model()->findAll(),'ID', 'DESCRIPTION'),
			'name'=>'ID_DEV',
			'value'=>'$data->device_list($data->ID)'
		),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{delete}',
		),
	),
)); ?>