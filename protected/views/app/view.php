<?php
/* @var $this AppController */
/* @var $model App */
?>


    
 

<div class="infoblock shadow"><h1 style="color:#20B2AA;">View App - <?php echo $model->name; ?></h1></div>
<HR WIDTH=1180 ALIGN=LEFT >
<HR SIZE=30 WIDTH=1180 ALIGN=LEFT >

<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       
	'Apps'=>array('index'),
	$model->name,
    ),
)); ?>


<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'description',
		'category',
		'developer',
		'id_users',
	),
)); ?>