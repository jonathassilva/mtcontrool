<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app ()->name . ' - Questionnaire - iOS';
$this->breadcrumbs = array (
		'About' 
);
?>

    <?php
				$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'quest-iOS',
						
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation' => false 
				) );
				?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<p> <b>Questionnaire - iOS</b></p>


<div class="well">
    	<?php $testes_selecionados = array();?>
		<?php echo TbHtml::lead('Characteristics '); ?>
		<?php echo TbHtml::small('To improve the quality of testing in  your app, please answer the questions simply check the functionality required by your app.', array('class'=>'help-block'));?>
		
		<p><?php echo TbHtml::b('Memory Use'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkMemory', '', array (
					'2.1, 2.2, 2.3, 2.4' => CHtml::encode ( 'Does your app write files ?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Connectivity'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkConnectivity', '', array (
					'3.1, 3.2, 3.3' => CHtml::encode ( 'Does your app use Network Connection?' ),
					'3.4' => CHtml::encode ( 'Does you app use downloadable resource files?' ) 
			) );
			?>  
		
		<p><?php echo TbHtml::b('Event Handling'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkEvent', '', array (
					'4.3, 4.4, 4.5' => CHtml::encode ( 'Does your app use timed events?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Messaging & Calls'); ?></p>
                        <?php
			echo TbHtml::checkBoxList ( 'checkMessage', '', array (
					'5.1, 5.2' => CHtml::encode ( 'Does your app send SMS or MMS messages as part of its functions?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('User Interface'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkUI', '', array (
					'7.11' => CHtml::encode ( 'Does your app support multiple display formats?' ),
					'7.12' => CHtml::encode ( 'Does your app support multiple devices?' ),
					'7.13' => CHtml::encode ( 'Does your app support multiple input formats?' ),
					'7.14' => CHtml::encode ( 'Does your app have accelerometer / motion sensor support?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Language'); ?></p>
			<?php
			echo TbHtml::checkBoxList ( 'checkLanguage', '', array (
					'8.2' => CHtml::encode ( 'Does your app allows selection of languages within the Application?' ) 
			) );
			?>
		<p><?php echo TbHtml::b('Performance'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkPerformance', '', array (
				'9.4' => CHtml::encode ( 'Does your app written to run as a Service?' ),
				'9.5' => CHtml::encode ( 'Does your app make use of contacts database?' ),
				'9.6' => CHtml::encode ( 'Does your app allow settings to be changed inside the app?' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Media'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkMedia', '', array (
				'10.1 , 10.5' => CHtml::encode ( 'Does your app have sounds/Sound Settings?' ),
				'10.2 , 10.3' => CHtml::encode ( 'Does your app have Setting options?' ),
				'10.4' => CHtml::encode ( 'Does your app save games state options?' ),
				'10.6' => CHtml::encode ( 'Does your app have vibrations?' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Menu'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkMenu', '', array (
				'11.1 , 13.6' => CHtml::encode ( 'Does your app use interface?' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Keys'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkKeys', '', array (
				'13.1 , 13.2 , 13.4' => CHtml::encode ( 'Does your app have user interaction?' ),
				'13.3' => CHtml::encode ( 'Does your app request time-sensitive user interaction?' ),
				'13.5' => CHtml::encode ( 'Does your app supports multi keys press or multi touch actions?' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Device and Extra Hardware Specific Tests'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkDevice', '', array (
				'14.5' => CHtml::encode ( 'Does your app/game designed to work with extra hardware?' ),
				'14.3 , 14.4' => CHtml::encode ( 'Does your app/game designed to work with devices with specialized hardware or with specific external attachment?' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Data Handling'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkData', '', array (
				'16.1 , 16.3' => CHtml::encode ( 'Does your app have game state / high score elements?' ),
				'16.2' => CHtml::encode ( 'Does your app have function to delete data? ' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Security'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkSecurity', '', array (
				'17.1 , 17.2' => CHtml::encode ( 'Does your app identified as communicating sensitive data?' ) 
		) );
		?>
		<p><?php echo TbHtml::b('Multiplayer'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkMultiplayer', '', array (
				'18.1, 18.2, 18.3, 18.4' => CHtml::encode ( 'Does your app have Multiplayer function?' ) 
		) );
		?>
                <p><?php echo TbHtml::b('Privacy and User Permissions'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkPrivacyandUserPermissions', '', array (
				'20.2' => CHtml::encode ( 'Does your app use location data?' ),
                                '20.3' => CHtml::encode ( 'Does your app use push notification?' )
		) );
		?>
                 <p><?php echo TbHtml::b('Platform Compliance for: In App Purchase, Adversiting and Multiplayer Game Lobby'); ?></p>
		<?php
		echo TbHtml::checkBoxList ( 'checkPlatformCompliance', '', array (
				'21.1' => CHtml::encode ( 'Does your app use in-app purchase?' ),
                                '21.2' => CHtml::encode ( 'Does your app use advertising?' ),
                                '21.3' => CHtml::encode ( 'Does your app use the multiplayer game lobby?' ),
                                '21.4' => CHtml::encode ( 'Does your app use subscriptions or rental mechanisms?' ),
                                '21.5' => CHtml::encode ( 'Does your app use enable charitable donations?' )
		) );
		?>
                
                 
	</div>

<?php echo TbHtml::button('Back', array('onclick' => 'js:document.location.href="/mtcontrool/runs/create"',
                    'color'=>TbHtml::BUTTON_COLOR_DEFAULT,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>
	 <?php echo TbHtml::link('Submit', array('runs/saveIOSQuest', 'id'=> $idRuns), array('class'=>'btn btn-success btn-large')); ?> 

 <?php echo TbHtml::button('Cancel', array('onclick' => 'js:document.location.href="/mtcontrool"',
                    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>

 


<?php $this->endWidget(); ?>
    