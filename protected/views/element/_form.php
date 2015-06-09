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

    <script type = "text/javascript">
		
	</script>

    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-43092768-1']);
      _gaq.push(['_trackPageview']);
      (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();


    </script>





	
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'element-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>




  

    <?php echo $form->errorSummary($model); ?>
    </br>

            <?php //echo $form->textFieldControlGroup($model,'ID_PLATFORM',array('span'=>5)); ?>
            <?php echo $form->textFieldControlGroup($model,'DESCRIPTION',array('span'=>5,'maxlength'=>50)); ?>

            
            <?php
            //array que ir� receber as plataformas selecionadas
			$selected_platforms = array ();
			//para cada plataforma, insere os id_plataforma escolhidos no array
			//var_dump($model->platforms);
			foreach ( $model->platforms as $platform )

			array_push ($selected_platforms, $platform->id);
			?>
			
			
			<div>
				<?php echo TbHtml::label($model->getAttributeLabel('platforms'),'Platforms'); ?>
				
				<div class="portlet-content">
				<!--echo TbHtml::inlineCheckBoxList('Platforms',/*'', $platformsArray,*/-->
				<?php echo TbHtml::CheckBoxList('Platforms',/*'', $platformsArray,*/
													  $selected_platforms,
													  CHtml::listData(Platforms::model()->findAll(),'id','name'),
													  array('id'=>'item','template'=>'{input} {label}',  'onchange'=>'verificaChecks()'/*,'onchange'=>'javascript:clickedVal();'*/)
													  ); ?>
				<?php echo $form->error($model,'platforms'); ?>
				</div>
			</div>



			<!--
			<?php
            //array que ir� receber as plataformas selecionadas
			$selected_devices = array ();
			//para cada plataforma, insere os id_plataforma escolhidos no array
			//var_dump($model->platforms);
			foreach ( $model->devices as $device )

			array_push ($selected_devices, $device->ID);
			?>
			
			
			<br/><br/>
			<div>
				<?php echo TbHtml::label($model->getAttributeLabel('devices'),'Device'); ?>
				
				<div class="portlet-content" id="divprincipal">
				<?php echo TbHtml::CheckBoxList('Devices',/*'',$devicesArray,*/
												$selected_devices , 
												CHtml::listData(Device::model()->findAll(),'ID','DESCRIPTION'),
												array('template'=>'{input} {label}')
												); ?>
				<?php echo $form->error($model,'device'); ?>
				</div>
			</div>
			-->

    </br>




	<?php //echo $form->dropDownListControlGroup($model,'ID_PLATFORM',$platformsArray, array('span'=>5, 'empty' => '--- Escolha uma plataforma ---')); ?>


            

        
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Next' : 'Next',array(
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

    <script type="text/javascript">
				novaLinha();
			</script>

</div><!-- form -->