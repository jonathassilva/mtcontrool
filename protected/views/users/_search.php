<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>70)); ?>

                    <?php echo $form->textFieldControlGroup($model,'user_name',array('span'=>5,'maxlength'=>60)); ?>

                    <?php echo $form->textFieldControlGroup($model,'country',array('span'=>5,'maxlength'=>200)); ?>

                    <?php echo $form->textFieldControlGroup($model,'phone',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'level',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>100)); ?>

           
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_SUCCESS,));?>
   

    <?php $this->endWidget(); ?>

</div><!-- search-form -->