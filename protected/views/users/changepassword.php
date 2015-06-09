<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


$this->pageTitle=Yii::app()->name . ' - Change Password.';
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />

<div id='box-logo'>
  <div id='logo-sw-270x60'></div>
</div>

<div class="infoblock shadow"><h1 style="color:#20B2AA; font-family: Arial">
       
        Change Password</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >


<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Login'=>array('index'),
	'Change Password',
    ),
)); ?>
    
    <?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'changePassword-form',
    
    'enableClientValidation'=>true,
    'clientOptions'=>array(
      'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>


    <?php echo $form->passwordField($model, 'currentPassword', array('class'=>'span3','placeholder'=>'Old Password')); ?>
    <br/>
    <?php echo $form->passwordField($model, 'newPassword', array('class'=>'span3','placeholder'=>'New Password')); ?>
    <br/>
    <?php echo $form->passwordField($model, 'newPassword_repeat', array('class'=>'span3','placeholder'=>'Repeat Password')); ?>
    </br></br>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Change', 'type'=>'success', 'size'=>'large')); ?>

    <?php $this->endWidget(); ?>

<?php 
  $this->widget('bootstrap.widgets.TbAlert', array(
      'block'=>true, // display a larger alert block?
      'fade'=>true, // use transitions?
      'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
      'alerts'=>array( // configurations per alert type
        'success'=>array(
          'block'=>true,
          'fade'=>true,
          'closeText'=>'&times;',
        ), // success, info, warning, error or danger
      ),
    )
  );
?>