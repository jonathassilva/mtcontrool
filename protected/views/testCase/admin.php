<?php
/* @var $this TestCaseController */
/* @var $model TestCase */






Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#test-case-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Manage Test Cases</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Test Cases'=>array('index'),
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
	'id'=>'test-case-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'num',
		'name',
		'description',
		'required',
		'notes',
		
		'steps',
		'result',
		/*'id_characteristic',*/
		array(
                    'name'=>'id_criteria',
                    'value'=>'$data->idCriteria->name',
                   
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</div>