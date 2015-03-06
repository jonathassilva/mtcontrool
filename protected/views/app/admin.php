<?php
/* @var $this AppController */
/* @var $model App */






Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#app-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<div class="infoblock shadow"><h1 style="color:#20B2AA;">Manage Apps</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Apps'=>array('index'),
	'Manage Apps',
    ),
)); ?>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'type' => TbHtml::GRID_TYPE_HOVER,
	'id'=>'app-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'category',
		'developer',
		'id_users',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>