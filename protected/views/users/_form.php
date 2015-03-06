<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>70)); ?>

            <?php echo $form->textFieldControlGroup($model,'phone',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'level',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'user_name',array('span'=>5,'maxlength'=>60)); ?>

            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>120)); ?>

        
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
  
    <?php $this->endWidget(); ?>

</div><!-- form -->