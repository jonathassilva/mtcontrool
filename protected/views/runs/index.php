<?php
/* @var $this RunsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $model Runs */
?>
<?php
Yii::app()->clientScript->registerScript('searchAdmin', "
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
        

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial;">
        <img src="../../images/manae.png" height="70" width="70">
        My Runs</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >

<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       
	'Runs'=>array('index'),
        'My Runs',
    ),
)); ?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

    <form method="get" >
    <p>Search by Application. Please, put the app's name:</p>
    <input type="search" placeholder="App" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" />


 <?php echo TbHtml::submitButton('',  array('color' => TbHtml::BUTTON_COLOR_SUCCESS,
     'value'=>'search',
     'icon' => 'fa fa-search',
     ));?>

</form>


<div class="group-div">
    
 
<?php $this->widget('bootstrap.widgets.BootGroupGridView',array(
        'id' => 'grid1',
 
    
    'itemsCssClass'=>'table table-bordered table-condensed',
	'dataProvider'=>$dataProvider,
  
       // 'mergeColumns' => array('id_app'),
    'extraRowColumns' => array('id_app'),
    
    'extraRowExpression' => '"<b style=\"font-size: 1.0em; color: #696969\">".$data->idApp->name."</b>"',
    	//'itemView'=>'_view',
        'columns' => array(
        //'id_app',
        array(
            'name'=>'id_app',
            'value'=>'$data->idApp->name',
          'filter'=>$model->search(),
            
            ),
       // 'id_order',
            array(
                'name' => 'Run',
                'value' => '$data->id_order',
            //    'htmlOptions'=>array('style'=>'text-align: center'),
              // 'headerHtmlOptions'=>array('style'=>'text-align: center'),
            ),
        //'id',
       // 'id_platform',
        array(
                    'name'=>'id_platform',
                    'value'=>'$data->idPlatform->name',
      
            
                    
                ),
            array(
                'name'=>'Version',
                'value' => '$data->version',
                //'filter'=> CHtml::getFilterCellContent(),
               // 'filter' => CHtml::activeTextField($data,'$data->version'),
                //'htmlOptions'=>array('style'=>'text-align: center'),
               // 'headerHtmlOptions'=>array('style'=>'text-align: center'),
            ),
       // 'version',
        'changelog',
            array(
                //'header' => t("test_runs", "id"),
                'name' => 'Passed',
                'value' => 'Runs::QuantidadePass($data->id)',
                 'htmlOptions'=>array('style'=>'text-align: center'),
                'headerHtmlOptions'=>array('style'=>'color: green; text-align: center'),
               ),
           array(
                //'header' => t("test_runs", "id"),
                'name' => 'Failed',
               
                 'value' => 'Runs::QuantidadeFail($data->id)',
                'htmlOptions'=>array('style'=>'text-align: center'),
               'headerHtmlOptions'=>array('style'=>'color: red; text-align: center'),
               ),
            array(
                //'header' => t("test_runs", "id"),
                'header' => 'Completed (%)',
                'value' => 'Runs::QuantidadeTotal($data->id)',
                'htmlOptions'=>array('style'=>'text-align: center'),
                'headerHtmlOptions'=>array('style'=>'text-align: center'),
               
                
               ),
        array('class' => 'CButtonColumn',
               'header' => 'Operations',
            'template'=>'{Dashboard}{delete}',
            'buttons' => array(
                'Dashboard' => array
        (
            
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            'url'=>'Yii::app()->createUrl("runs/view", array("id"=>$data->id))',
        ),
                
                'delete' => array
        (
            
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
            
        ),
                
                ),
            ),
            array(
           'name' => 'id_app',
           'value' => '$data->idPlatform->name',
           'headerHtmlOptions' => array('style' => 'display: none'),
           'htmlOptions' => array('style' => 'display: none'),
        ),
       ),
    

    
    
)); ?>
    </div>