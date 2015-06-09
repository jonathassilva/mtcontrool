<?php
?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial;">
       
        Share</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >

<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Apps'=>array('index'),
	'Manage Apps'=>array(),
            'Share App'
    ),
)); ?>

<div class="form">

    
    <?php
				
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'share-form',
						
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation' => false 
				) );
				?>
    <?php echo $form->errorSummary($model); ?>

                        <?php
            //array que ir� receber as plataformas selecionadas
			//$selected_users = array ();
			?>
			
			<!-- <div>
                            	<?php //echo TbHtml::label($model->getAttributeLabel('Users'),'Users'); ?>
				
				<div class="portlet-content">
                                    <?php// echo TbHtml::dropDownListControlGroup('Users', $selected_users , CHtml::listData(Users::model()->findAll(),'id','name'),array('template'=>'{input} {label}')); ?>
				<?php //echo $form->error($model,'idUsers'); ?>
				</div>
			</div>
			
			</br></br> -->
	
<div class="container">
    <div class="tabela">
                            <div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span6">
                                    <div class="row-fluid">
                            <?php echo TbHtml::label($model->getAttributeLabel('User'),'name'); ?>
        <?php 
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'attribute'=>'name',
                  'model'=>$model,
                  'sourceUrl'=>array('site/aclist'),
                  'name'=>'name',
                  'options'=>array(
                    'minLength'=>'3',
                  ),
                  'htmlOptions'=>array(
                    'size'=>45,
                    'maxlength'=>45,
                  ),
        )); ?>
                                        <br/>
                                        
                                          <?php echo TbHtml::submitButton($model->isNewRecord ? 'Share' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    
                <?php echo TbHtml::button('Cancel', array('onclick' => 'js:document.location.href="/mtcontrool"',
                    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>
                                    </div></div>
                
                    /*  <div class="span6">
                                    <div class="row-fluid">  
              <?php
            //array que ir� receber os sados selecionados
			$selected_category = array ();
			//para cada plataforma 
			foreach ( $model->appUsers as $cat )
			array_push ($selected_category, $cat->id);
			?>
                    <div class="group-div">
			<div>
				<?php echo TbHtml::label($model->getAttributeLabel('appUsers'),'AppUsers'); ?>
                            <p>
				<div class="portlet-content">
				<?php echo TbHtml::CheckBoxList('AppUsers', $selected_category, CHtml::listData(AppUsers::model()->findAll(),'id','name'),array('template'=>'{input} {label}')); ?>
				<?php echo $form->error($model,'appUsers'); ?>
				</div>
                        </p>
                        </div>
                    
                    <?php echo CHtml::link(CHtml::encode('Remove'), array('appUsers/delete', 'id'=>$model->id), 
                            array( 
                        'submit'=>array('appUsers/delete', 
                        'id'=>$model->id),
                        'class' => 'delete btn btn-danger',
                        'confirm'=>'This will remove the image. Are you sure?' 
                                ));  ?>
                    </div>
                                    </div></div>*/
									
									</div></div></div></div>
              
              
                        

            
              
    <?php $this->endWidget(); ?>
</div>