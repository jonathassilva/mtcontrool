<?php
/* @var $this CriteriaController */
/* @var $model Criteria */




Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#criteria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Manage Criterias</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >

<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Criterias'=>array('index'),
	'Manage',
    ),
)); ?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<div class="group-div">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'criteria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'num_order',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
        )); ?></div>