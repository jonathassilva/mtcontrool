<?php
/* @var $this CharacteristicController */
/* @var $dataProvider CActiveDataProvider */
?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        


<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">Characteristics</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >

<?php


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Characteristics'=>array('index'),
	
    )));
?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        
)); ?>