<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php
/* @var $this ElementController */
/* @var $model Element */
?>

<?php
/*$this->breadcrumbs=array(
	'Elements'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Element', 'url'=>array('index')),
	array('label'=>'Create Element', 'url'=>array('create')),
	array('label'=>'View Element', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Element', 'url'=>array('admin')),
);*/
?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Update Element *<?php echo $model->DESCRIPTION; ?> </h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Element'=>array('admin'),
	'Update Element',
    ),
)); ?>

    <!--<h1>Update Element - <?php //echo $model->DESCRIPTION; ?></h1>-->
<?php $_SESSION['form-element'] = "p1";?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<!--
<div class="form-actions">
<a href="/mtcontrool/index.php/elementinst/create?idElement=<?php echo $model->ID;?>&elementDescription=<?php echo $model->DESCRIPTION;?>"><b>New instance</b></a>
</div>
-->
<?php 
/*$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'element-inst-grid',
	'dataProvider'=>$modelInst->searchById($model->ID),
	//'filter'=>$modelInst,
	'columns'=>array(
		//'ID',
		//'ID_ELEMENT',
		'ELEMENT_TYPE',
		'DESCRIPTION',
		'START_PARAM',
		'END_PARAM',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{delete}',
			'buttons'=>array
		    (
		        'update' => array
		        (
		            //'label'=>'Send an e-mail to this user',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            'url'=>'Yii::app()->createUrl("elementinst/update", array("id"=>$data->ID))',
		        ),
		        'delete' => array
		        (
		            //'label'=>'[-]',
		            //'url'=>'"#"',
		            //'visible'=>'$data->score > 0',
		            //'click'=>'function(){alert("Going down!");}',
		            'url'=>'Yii::app()->createUrl("elementinst/delete", array("id"=>$data->ID))',
		        ),
		    ),
		),
	),
));*/ 
?>
<!--
<div class="form-actions">
<?
/*php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'element-grid',
	'dataProvider'=>$modelList->search(),
	'filter'=>$modelList,
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
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{delete}',
		),
	),
));*/
 ?>
</div>
-->