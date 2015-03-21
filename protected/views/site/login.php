<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);


?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />

<link href='http://fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
    
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>


<div class="login-body">
    
   
    
    <div class="position_img">
    <img src="../../images/INDT_pref_color.png" width="200" height="200"/> 
    </div>
    
    
    <article class="container-login center-block">
        <section>
            <ul id="top-bar" class="nav nav-tabs nav-justified">
				
				<li><a href="#">Login</a></li>
			</ul>
           
        <div class="tab-content tabs-login ">
				<div id="login-access" class="tab-pane fade active in">
					<form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal">
						
        
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="row rememberMe">
            
		<?php echo $form->checkBox($model,'rememberMe') ; echo " Remember me next time"; ?>
                </br>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div></br>
                                            
	<div class="form-group ">				
		<button type="submit" name="log-me-in" id="submit" tabindex="5" >Login  <i class="fa fa-sign-in"></i></button>
        </div>
            
        </form>
        </section>                              
        </article>
        </div>
</div>
</div>
</div>
<?php $this->endWidget(); ?>
<!-- form -->

