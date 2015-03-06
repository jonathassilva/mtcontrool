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

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_app',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_platform',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'description',array('span'=>5,'maxlength'=>30)); ?>

                    <?php echo $form->textAreaControlGroup($model,'changelog',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_SUCCESS,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->