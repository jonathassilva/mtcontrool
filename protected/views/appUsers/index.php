<?php
?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
    
        <div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">
         <img src="../../../images/sha.png" height="70" width="70">
        Share App</h1></div>
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
                                         <p class="help-block">Choose a user to share a app:</p>
                                        
    <?php $this->widget('application.extensions..myAutoComplete', array(
    'model'=>$model,
 
    'attribute'=>'id_users',
    'name'=>'user_autocomplete',
    'source'=>$this->createUrl('appUsers/usersAutoComplete'),  // Controller/Action path for action we created in step 4.
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'0',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;',
    ),    ));   ?> 
                                        
                                        
                                        
                                        
                                        <br/><br/>
                                        
                <?php echo TbHtml::submitButton($model->isNewRecord ? 'Share' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    
                <?php echo TbHtml::button('Cancel', array('onclick' => 'js:document.location.href="/mtcontrool"',
                    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>
                                    </div></div>
                
                     <div class="span6">
                                    <div class="row-fluid">  
             
                                        <div class="">
                                           
 <?php
      //  $list = CHtml::listData(Users::model()->findAll(array('order' =>'name')), 'id', 'name');
        //echo $form->dropDownList($model, 'id_users', $list);
        ?>   
             <?php 
             
            // $variavel = $DadosLista;
             
           //  var_dump($variavel);
             
                            
             
             ?>
                                            
                                                                       
       <!--   <div class="row">
              <div class="well"> 
        <?php// echo $form->labelEx($model, 'User'); ?>
                  <br/>
        <?php //echo $form->checkBoxList($model, 'id_users', $DadosLista); ?>
        <?php //echo $form->error($model,'id_users'); ?>
          <br/>
              <?php //echo CHtml::link(CHtml::encode('Remove'), array('appUsers/delete'), 
                           // array( 
                      //  'submit'=>array('appUsers/delete', 
                       // 'id'=>$model->id_users),
                     //   'class' => 'delete btn btn-danger',
                        //'confirm'=>'This will remove the share. Are you sure?' 
                              //  )); ?>
              </div></div>-->
                                      
                                            
                       
                    
                    
                    </div>
                                    </div>
									
									</div></div>
    
    <div class="span6">
        <div class="row-fluid">
            
        </div></div>
    
    </div></div>
                        
                        
              
              
                        

            
              
    <?php $this->endWidget(); ?>
</div>