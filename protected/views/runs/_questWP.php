<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app ()->name . ' - Questionnaire - Windows Phone';
$this->breadcrumbs = array (
		'About' 
);
?>

    <?php
				$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'quest-WP',
						
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation' => false 
				) );
				?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<p> <b>Questionnaire - Windows Phone</b></p>


<div class="well">
    	<?php $testes_selecionados = array();?>
		<?php echo TbHtml::lead('Characteristics '); ?>
		<?php echo TbHtml::small('To improve the quality of testing in  your app, please answer the questions simply check the functionality required by your app.', array('class'=>'help-block'));?>
		
		<p><?php echo TbHtml::b('Connectivity'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkConnectivity', '', array (
					'3.1, 3.2' => CHtml::encode ( 'Does your app use Network Connection?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Content Interaction'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkContentInteraction', '', array (
					'4.1, 4.2, 4.3, 4.5' => CHtml::encode ( 'Does your app have content interaction?' ),
					'4.4' => CHtml::encode ( 'Does you app support hover feedback?' ) 
			) );
			?>  
		
		<p><?php echo TbHtml::b('Games'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkGames', '', array (
					'6.1, 6.2, 6.3, 6.4' => CHtml::encode ( 'Does your app is a game?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Contracts and Extensions'); ?></p>
                        <?php
			echo TbHtml::checkBoxList ( 'checkContracts', '', array (
					'7.1, 7.2' => CHtml::encode ( 'Does your app is a share source?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Audio and Video'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkAudioAndVideo', '', array (
					'9.1, 9.2' => CHtml::encode ( 'Does your app is a music app?' ),
					'9.3' => CHtml::encode ( 'Does your app use voice call?' ),
					'9.4' => CHtml::encode ( 'Does your app have sounds?' )
			) );
			?>
                
	</div>

 <?php echo TbHtml::button('Back', array('onclick' => 'js:document.location.href="/mtcontrool/runs/create"',
                    'color'=>TbHtml::BUTTON_COLOR_DEFAULT,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>
	 <?php echo TbHtml::link('Submit', array('runs/saveWPQuest', 'id'=> $idRuns), array('class'=>'btn btn-success btn-large')); ?> 

 <?php echo TbHtml::button('Cancel', array('onclick' => 'js:document.location.href="/mtcontrool"',
                    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>



<?php $this->endWidget(); ?>
    