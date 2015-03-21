<?php
/* @var $this AppController */
/* @var $model App */
/* @var $form TbActiveForm */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />


<div class="form">

    <?php
				
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'app-form',
						
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

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>150)); ?>

            <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'category',array('span'=>5,'maxlength'=>70)); ?>

            <?php echo $form->textFieldControlGroup($model,'developer',array('span'=>5,'maxlength'=>100)); ?>
</br></br>
            <?php
            //array que ir� receber as plataformas selecionadas
			$selected_platforms = array ();
			//para cada plataforma, insere os id_plataforma escolhidos no array
			foreach ( $model->platforms as $platform )
			array_push ($selected_platforms, $platform->id);
			?>
			
			<div>
				<?php echo TbHtml::label($model->getAttributeLabel('platforms'),'Platforms'); ?>
				
				<div class="portlet-content">
				<?php echo TbHtml::inlineCheckBoxList('Platforms', $selected_platforms , CHtml::listData(Platforms::model()->findAll(),'id','name'),array('template'=>'{input} {label}')); ?>
				<?php echo $form->error($model,'platforms'); ?>
				</div>
			</div>
			
			</br></br>
			<?php
            //array que ir� receber os sados selecionados
			$selected_languages = array ();
			//para cada plataforma 
			foreach ( $model->languages as $language )
			array_push ($selected_languages, $language->id);
			?>
			<div>
				
				<?php echo TbHtml::label($model->getAttributeLabel('languages'),'Languages'); ?>
                            <p>
				<div class="portlet-content">
				<?php echo TbHtml::CheckBoxList('Languages', $selected_languages, CHtml::listData(Languages::model()->findAll(),'id','name'),array('template'=>'{input} {label}')); ?>
				<?php echo $form->error($model,'languages'); ?>
				</div>
                        </p>
			</div>

                        <br/>
        <?php echo TbHtml::submitButton ( $model->isNewRecord ? 'Create' : 'Save', array ('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'size'=>TbHtml::BUTTON_SIZE_LARGE, ));?>
    

    <?php $this->endWidget(); ?>

</div>
<!-- form -->