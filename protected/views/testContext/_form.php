<?php
/* @var $this TestContextController */
/* @var $model TestContext */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'test-context-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
    'enableAjaxValidation'=>true,
        'clientOptions' => array(
        'validateOnSubmit'=>true,
    ),
)); ?>


</script>
<script language="javascript" type="text/javascript">
  /*function selecionaAmbos(){
    document.getElementById("Usuario_ALUNO_2").checked=true
  }*/
  function desableAll(){
    //document.getElementById("dd1").disabled=true;
    //document.getElementById("dd2").disabled=true;

    if (document.getElementById("dd0").selectedIndex==true) {
        document.getElementById("dd1").disabled=false;
        document.getElementById("dd2").disabled=false;
    }else if (document.getElementById("dd0").selectedIndex==false) {
        document.getElementById("dd1").disabled=true;
        document.getElementById("dd2").disabled=true;
    }
  }

  function Hab(){

    if (document.getElementById("dd0").selectedIndex==true) {
      if (document.getElementById("dd1").disabled==true) {
        document.getElementById("dd1").disabled=false;
      }
      if (document.getElementById("dd2").disabled==true) {
        document.getElementById("dd2").disabled=false;
      }

    }else if (document.getElementById("dd0").selectedIndex==false) {
      document.getElementById("dd1").disabled=true;
      document.getElementById("dd2").disabled=true;
      document.getElementById("dd1").selectedIndex=false;
      document.getElementById("dd2").selectedIndex=false;
    }

  }

  /*function Hab2(){

    if (document.getElementById("dd1").selectedIndex==true) {
      //if (document.getElementById("dd1").disabled==true) {
      //  document.getElementById("dd1").disabled=false;
      //}
      if (document.getElementById("dd2").disabled==true) {
        document.getElementById("dd2").disabled=false;
      }

    }else if (document.getElementById("dd1").selectedIndex==false) {
      //document.getElementById("dd1").disabled=true;
      document.getElementById("dd2").disabled=true;
      //document.getElementById("dd1").selectedIndex=false
      document.getElementById("dd2").selectedIndex=false;
      
    }

  }*/

  /*function Hab1() {

    if (document.getElementById("dd0").selectedIndex==true) {
      if (document.getElementById("dd1").disabled==true) {
        //document.getElementById("CampoCurso").disabled=false;
        //aparece com o dropdown
        //document.getElementById("CampoCurso").style.display='block';
        //document.getElementById("labelCursoDropDown").style.display='block';

        document.getElementById("dd1").disabled=false;
        //some com o dropdown
        //document.getElementById("CampoUnidade").style.display='none';
        //document.getElementById("labelUnidadeDropDown").style.display='none';
      }
      if (document.getElementById("dd2").disabled==true) {
        //document.getElementById("CampoCurso").disabled=false;
        //aparece com o dropdown
        //document.getElementById("CampoCurso").style.display='block';
        //document.getElementById("labelCursoDropDown").style.display='block';

        document.getElementById("dd2").disabled=false;
        //some com o dropdown
        //document.getElementById("CampoUnidade").style.display='none';
        //document.getElementById("labelUnidadeDropDown").style.display='none';
      }

    }else if (document.getElementById("dd0").selectedIndex==false) {
      document.getElementById("dd1").disabled=true;
      document.getElementById("dd2").disabled=true;
      document.getElementById("dd1").selectedIndex=false
      document.getElementById("dd2").selectedIndex=false

    }
    
    else if (document.getElementById("Usuario_ALUNO_1").checked==true) {
      document.getElementById("CampoCurso").disabled=true;
      //some com o dropdown
      document.getElementById("CampoCurso").style.display='none';
      document.getElementById("labelCursoDropDown").style.display='none';
      document.getElementById("CampoCurso").focus();

      document.getElementById("CampoUnidade").disabled=false;
      //aparece com o dropdown
      document.getElementById("CampoUnidade").style.display='block';
      document.getElementById("labelUnidadeDropDown").style.display='block';
    }
    else if (document.getElementById("Usuario_ALUNO_2").checked==true) {
      document.getElementById("CampoCurso").disabled=false;
      //aparece com o dropdown
      document.getElementById("CampoCurso").style.display='block';
      document.getElementById("labelCursoDropDown").style.display='block';
      document.getElementById("CampoCurso").focus();

      document.getElementById("CampoUnidade").disabled=false;
      //aparece com o dropdown
      document.getElementById("CampoUnidade").style.display='block';
      document.getElementById("labelUnidadeDropDown").style.display='block';
    }
    else{
      //document.getElementById("Usuario_ALUNO_1").checked=true;
      document.getElementById("CampoCurso").disabled=true;
      //some com o dropdown
      document.getElementById("CampoCurso").style.display='none';
      document.getElementById("labelCursoDropDown").style.display='none';

      document.getElementById("CampoUnidade").disabled=true;
      //some com o dropdown
      document.getElementById("CampoUnidade").style.display='none';
      document.getElementById("labelUnidadeDropDown").style.display='none';
    }
  }*/
</script>


<link rel="stylesheet" type="text/css"
    href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

        
            <?php //echo $form->textFieldControlGroup($model,'ID_USER',array('span'=>5)); ?>
            <font size="5">
            <?php echo "<b>Current user: </b>";?>
            <?php echo Yii::app()->user->getName();?>
            </font>
            <br/><br/>

            <?php echo $form->textFieldControlGroup($model,'DESCRIPTION',array('span'=>5,'maxlength'=>50)); ?>
        

            
            <?php echo $form->dropDownListControlGroup($model,'ID_APP',$appsArray, array('id'=>'dd0',/*"disabled"=>"disabled",*/ 'empty' => '--- Choose a app ---','onchange'=>'Hab()')); ?>

            <?php 
            //echo $form->dropDownListControlGroup($model,'ID_PLATFORM',$platformsArray, array(/*'id'=>'BrandField',"disabled"=>"disabled",*/ 'empty' => '--- Choose a platform ---'),
            /*echo $form->dropDownListControlGroup($model,'ID_PLATFORM',CHtml::listData(platformS::model()->findAll(),'id', 'name'),array('id'=>'platformsDropDown','empty'=>'--- Choose a device ---'),
            array(
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => CController::createUrl('TestContext/ListDevices'),
                                    //'TestCase' => 'TESTE',
                                    'update' => '#'.CHtml::activeId($model,'ID_DEVICE'),
                                    //'update'=>'#device_id',
                                ),'prompt'=>'Select')
                            );*/
            echo $form->dropDownListControlGroup($model,
                                      'ID_PLATFORM',
                                      $platformsArray,
                                      array('id'=>'dd1','empty'=>'--- Choose a platform ---'/*,'onchange'=>'Hab2()'*/,
                                        'ajax'=>array(
                                            'type'=>'POST',
                                            'url'=>CController::createUrl('testcontext/listdevices'),
                                            'update'=>'#dd2',
                                            'data'=>array('categoryid'=>'js:this.value'),
                                         ),
                                      ));  
                            ?>

            <?php echo $form->dropDownListControlGroup($model,'ID_DEVICE',$devicesArray,array('id'=>'dd2','empty'=>'--- Choose a device ---')); ?>
            
            <?php //echo $form->dropDownListControlGroup($model,'ID_DEVICE',array(),array('id'=>'devicesDropDown','prompt'=>'Select')); ?>

            





            <div class="row">
               <?php //echo $form->labelEx($model,'ID_PLATFORM'); ?>
               <?php //$categories=Yii::app()->Datacomponent->usercategory();
               /*echo $form->dropDownListControlGroup($model,
                                      'ID_PLATFORM',
                                      $platformsArray,
                                      array('empty'=>'Select platform ',
                                        'ajax'=>array(
                                            'type'=>'POST',
                                            'url'=>CController::createUrl('testcontext/listdevices'),
                                            'update'=>'#dd1',
                                            'data'=>array('categoryid'=>'js:this.value'),
                                         ),
                                      ));*/ 
              ?> 
              <?php //echo $form->error($model,'ID_PLATFORM'); ?>
            </div>
                 
            <div class="row">
             <?php //echo $form->labelEx($model,'ID_DEVICE'); ?>
             <?php //echo $form->dropDownList($model,'ID_DEVICE',array(),array('id'=>'dd1','empty'=>'Select DEVICE')); 
            ?>
            <?php //echo $form->error($model,'ID_DEVICE'); ?>
        </div>






       <div class="form-actions">     
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Next',array(
        'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
        'size'=>TbHtml::BUTTON_SIZE_LARGE,
    )); ?>

    <?php echo TbHtml::submitButton('Cancel',array(
        'name' => 'buttonCancel',
        'color'=>TbHtml::BUTTON_COLOR_DANGER,
        'size'=>TbHtml::BUTTON_SIZE_LARGE,
    )); ?>

    <script type="text/javascript">
      desableAll();
    </script>
    
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->