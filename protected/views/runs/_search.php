<?php
/* @var $this RunsController */
/* @var $model Runs */
/* @var $form CActiveForm */
?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                   

                    <?php echo $form->textFieldControlGroup($model,'id_app',array('span'=>5)); ?>

                    
   
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_SUCCESS,));?>
  

    <?php $this->endWidget(); ?>

</div><!-- search-form -->