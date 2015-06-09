<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */


$this->pageTitle=Yii::app()->name . ' - Recuperar Senha';

?>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">
       
        Reset Password</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >






<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	), 'htmlOptions'=>array('class'=>'well'),
)); ?>
   
<p>
If you forgot your password, follow the instructions to recover it.
</p>
        
	
        <br/>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php// echo $form->labelEx($model,'user_name'); ?>
		<?php //echo $form->textField($model,'user_name'); ?>
		<?php //echo $form->error($model,'user_name'); ?>
	</div>-->

		<?php echo $form->labelEx($model,'Username'); ?>
		<?php echo $form->textField($model,'user_name'); ?>
		<?php echo $form->error($model,'user_name'); ?>
	<br/><br/>
	
	<?php if(CCaptcha::checkRequirements()): ?>

		<?php echo $form->labelEx($model,'Security Check'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
				<br/><br/>
                        
		<?php //echo CHtml::label('Type the characters you see in the picture below:', '',array('id'=>'labelCaptcha')); ?>
                    <p>Type the characters you see in the picture below:</p>
                    <?php echo $form->textField($model,'verifyCode'); ?>
	
		
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	
<br/>

		<?php echo TbHtml::submitButton('Submit',array(
                     'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                    )); ?>
	
    </div>
  

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
