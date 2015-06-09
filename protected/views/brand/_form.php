<?php
/* @var $this BrandController */
/* @var $model Brand */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'brand-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'BRAND_NAME',array('span'=>5,'maxlength'=>50)); ?>

        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
	    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
	    'size'=>TbHtml::BUTTON_SIZE_LARGE,
	)); ?>

	<?php echo TbHtml::submitButton('Cancel',array(
		'name' => 'buttonCancel',
	    'color'=>TbHtml::BUTTON_COLOR_DANGER,
	    'size'=>TbHtml::BUTTON_SIZE_LARGE,
	)); ?>
	<div class="form-actions">
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->