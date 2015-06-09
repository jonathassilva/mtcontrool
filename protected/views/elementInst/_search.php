<?php
/* @var $this ElementInstController */
/* @var $model ElementInst */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID_ELEMENT',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID_TEST_CONTEXT',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ELEMENT_TYPE',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'DESCRIPTION',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'START_PARAM',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'END_PARAM',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->