<?php
/* @var $this CharacteristicController */
/* @var $model Characteristic */
/* @var $form TbActiveForm */
?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'characteristic-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>400)); ?>
    
             <?php echo $form->dropDownListControlGroup($model,'id_criteria',CHtml::listData(Criteria::model()->findAll(), 'id', 'name'),
                     array(
                         'prompt' =>'Selected',
                         
                     )
                     
                     );?>

    </br>
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    

    <?php $this->endWidget(); ?>

</div><!-- form -->