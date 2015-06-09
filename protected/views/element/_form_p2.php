<?php
/* @var $this ElementController */
/* @var $model Element */
/* @var $form TbActiveForm */
?>

	
	<link href="http://localhost/mtcontrool/mtcontrool/bootstrap-switch/docs/css/highlight.css" rel="stylesheet">
	<link href="http://localhost/mtcontrool/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
	<link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
	

	<script src="http://localhost/mtcontrool/bootstrap-switch/docs/js/jquery.min.js"></script>
    <script src="http://localhost/mtcontrool/bootstrap-switch/docs/js/highlight.js"></script>
    <script src="http://localhost/mtcontrool/bootstrap-switch/dist/js/bootstrap-switch.js"></script>
    <script src="http://localhost/mtcontrool/bootstrap-switch/docs/js/main.js"></script>

 	
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'element-form-p2',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>


			<?php
            //array que ir� receber as plataformas selecionadas
			$selected_devices = array ();
			//para cada plataforma, insere os id_plataforma escolhidos no array
			//var_dump($model->platforms);
			foreach ( $model->devices as $device )

			array_push ($selected_devices, $device->ID);
			?>


			
			
			<div>
				<?php echo TbHtml::label($model->getAttributeLabel('devices'),'Device'); ?>
				
				<div class="portlet-content" id="divprincipal">
				<?php echo TbHtml::CheckBoxList('Devices',/*'',$devicesArray,*/
												$selected_devices , 
												$devicesArray,
												//CHtml::listData(Device::model()->findAll(),'ID','DESCRIPTION'),
												
												array('template'=>'{input} {label}')
												); ?>
				<?php echo $form->error($model,'device'); ?>
				</div>
			</div>
			

    </br>




	<?php //echo $form->dropDownListControlGroup($model,'ID_PLATFORM',$platformsArray, array('span'=>5, 'empty' => '--- Escolha uma plataforma ---')); ?>


            

        
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array(
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