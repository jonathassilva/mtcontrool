<?php
/* @var $this PlatformsController */
/* @var $model Platforms */
/* @var $form TbActiveForm */
?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />


        
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'platforms-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>40)); ?>

   
            <?php
            //array que ir� receber as characteristics selecionadas
			$selected_characteristic = array ();
			//para cada plataforma, insere os id_plataforma escolhidos no array
			foreach ( $model->characteristic as $characteristic )
			array_push ($selected_characteristic, $characteristic->id);
			?>
			
			<div>
				<?php echo TbHtml::label($model->getAttributeLabel('characteristic'),'Characteristic'); ?>
			    <p class="help-block">Choose the platform's characteristics.</p>
                            <div class="model-char">	
				<div class="portlet-content">
				<?php echo TbHtml::CheckBoxList('Characteristic', $selected_characteristic , CHtml::listData(Characteristic::model()->findAll(),'id','name'),array('template'=>'{input} {label}')); ?>
				<?php echo $form->error($model,'characteristic'); ?>
				</div>
			</div>
    </div>
    <br/>
    
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
   
                <?php echo TbHtml::button('Cancel', array('onclick' => 'js:document.location.href="/mtcontrool"',
                    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>
    
    <?php $this->endWidget(); ?>

</div><!-- form -->