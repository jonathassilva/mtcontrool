<?php
/* @var $this TestContextController */
/* @var $model TestContext */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID_USER',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID_APP',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID_PLATFORM',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'ID_DEVICE',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'DESCRIPTION',array('span'=>5,'maxlength'=>50)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->