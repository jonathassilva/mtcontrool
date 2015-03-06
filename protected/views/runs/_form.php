<?php
/* @var $this RunsController */
/* @var $model Runs */
/* @var $form TbActiveForm */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        

<div class="form">
    <?php
				$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'runs-form',
						
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation' => false 
				) );
				?>

    <p class="help-block">
		Fields with <span class="required">*</span> are required.
	</p>

    <?php echo $form->errorSummary($model); ?>

            <?php //echo $form->textFieldControlGroup($model,'id_app',array('span'=>5)); ?>
            <?php echo $form->dropDownListControlGroup($model,'id_app',CHtml::listData(App::model()->findAllByAttributes(array('id_users'=>'1')), 'id', 'name'),
                    array(
                        'prompt'=>'Selected',
                    )
                    );?>

            <?php echo $form->dropDownListControlGroup($model,'id_platform',CHtml::listData(Platforms::model()->findAll(), 'id', 'name'),
                    array(
                        'prompt'=>'Selected',
                    ));?>
            
            <?php echo $form->textFieldControlGroup($model,'description',array('span'=>5,'maxlength'=>30)); ?>

            <?php echo $form->textAreaControlGroup($model,'changelog',array('rows'=>6,'span'=>8)); ?>
	
	        <?php echo TbHtml::submitButton ( $model->isNewRecord ? 'Next ' : 'Save', array ('color' => TbHtml::BUTTON_COLOR_SUCCESS,'size' => TbHtml::BUTTON_SIZE_LARGE)); ?>
	    	
    <?php $this->endWidget(); ?>
    
</div>
<!-- form -->