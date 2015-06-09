<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form TbActiveForm */


?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-edit',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>70)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>100)); ?>
    
            <?php echo $form->dropDownListControlGroup($model,'country',array(
                'Afghanistan',
                'Albania',
                'Algeria',
                'Andorra',
                'Angola',
                'Antigua & Barbuda',
                'Argentina',
                'Armenia',
                'Australia',
                'Austria',
                'Azerbaijan',
                'Bahamas',
                'Bahrain',
                'Bangladesh',
                'Barbados',
                'Belarus',
                'Belgium',
                'Belize',
                'Benin', 
                'Bhutan', 
                'Bolivia', 
                'Bosnia & Herzegovina', 
                'Botswana',
                'Brazil', 
                'Brunei', 
                'Darussalam', 
                'Bulgaria', 
                'Burkina Faso', 
                'Burma (Myanmar)', 
                'Burundi',
                'Cambodia',
                'Cameroon', 
                'Canada', 
                'Cape Verde', 
                'Central African Republic', 
                'Chad',	
                'Chile', 
                'China', 
                'Colombia', 
                'Comoros', 
                'Congo', 
                'Democratic Republic of the Congo',
                'Costa Rica', 
                'Côte d´Ivoire', 
                'Croatia', 
                'Cuba', 
                'Cyprus', 
                'Czech Republic',
                'Denmark',
                'Djibouti',
                'Dominica',
                'Dominican Republic',
                'Ecuador', 
                'East Timor', 
                'Egypt',	
                'El Salvador', 
                'England', 
                'Equatorial Guinea',	
                'Eritrea', 
                'Estonia', 
                'Ethiopia',
                'Fiji',
                'Finland',
                'France',
                'Gabon',
                'Gambia',
                'Germany',
                'Ghana',
                'Great Britain',
                'Greece',
                'Grenada',
                'Guatemala',
                'Guinea',
                'Guinea-Bissau',
                'Guyana',
                'Haiti',
                'Honduras',
                'Hungary',
                'Iceland',
                'India',
                'Indonesia',
                'Iran',
                'Iraq',
                'Ireland',
                'Israel',
                'Italy',
                'Jamaica',
                'Japan',
                'Jordan',
                'Kazakhstan',
                'Kenya',
                'Kiribati',
                'North Korea',
                'South Korea',
                'Kosovo',
                'Kuwait',
                'Kyrgyzstan',
                'Laos',
                'Latvia',
                'Lebanon',
                'Lesotho',
                'Liberia',
                'Libya',
                'Liechstenstein',
                'Lithuania',
                'Luxembourg',
                'Macedonia',
                'Madagascar',
                'Malawi',
                'Malaysia',
                'Maldives',
                'Mali',
                'Malta',
                'Marshall Islands',
                'Mauritania',
                'Mauritius',
                'Mexico',
                'Micronesia',
                'Moldova',
                'Monaco',
                'Mongolia',
                'Montenegro',
                'Morocco',
                'Mozambique',
                'Myanmar',
                'Namibia',
                'Nauru',
                'Nepal',
                'The Netherlands',
                'New Zealand',
                'Nicaragua',
                'Niger',
                'Nigeria',
                'Norway',
                'Northern Ireland',
                'Oman',
                'Pakistan',
                'Palau',
                'Palestinian State',
                'Panama',
                'Papua New Guinea',
                'Paraguay',
                'Peru',
                'The Philippines',
                'Poland',
                'Portugal',
                'Qatar',
                'Romania',
                'Russia',
                'Rwanda',
                'St. Kitts & Nevis', 
                'St. Lucia',
                'St. Vincent & The Grenadines',
                'Samoa', 
                'San Marino', 
                'São Tomé & Príncipe', 
                'Saudi Arabia',
                'Scotland', 
                'Senegal',	
                'Serbia', 
                'Seychelles', 
                'Sierra Leone', 
                'Singapore', 
                'Slovakia', 
                'Slovenia', 
                'Solomon Islands', 
                'Somalia', 
                'South Africa',	
                'Spain', 
                'Sri Lanka', 
                'Sudan', 
                'South Sudan', 
                'Suriname', 
                'Swaziland', 
                'Sweden', 
                'Switzerland',
                'Syria',
                'Taiwan', 
                'Tajikistan', 
                'Tanzania', 
                'Thailand',	
                'Togo Tonga', 
                'Trinidad & Tobago', 
                'Tunisia',	
                'Turkey', 
                'Turkmenistan', 
                'Tuvalu',
                'Uganda', 
                'Ukraine', 
                'United Arab Emirates',	
                'United Kingdom', 
                'United States',	
                'Uruguay', 
                'Uzbekistan',
                'Vanuatu',
                'Vatican City (Holy See)',
                'Venezuela',
                'Vietnam',
                'Western Sahara',
                'Wales',
                'Yemen',
                'Zaire',
                'Zambia',
                'Zimbabwe'

      
            )); ?>
    </br>
    
            <?php echo $form->textFieldControlGroup($model,'phone',array('span'=>5)); ?>

            <?php echo $form->dropDownListControlGroup($model,'level',array('Tester','Admin')); ?>
    </br>
            <?php echo $form->textFieldControlGroup($model,'user_name',array('span'=>5,'maxlength'=>60)); ?>
            
            
    </br>
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    
    <?php echo TbHtml::button('Cancel', array('onclick' => 'js:document.location.href="/mtcontrool/index.php/users/admin"',
                    'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                )); ?>
    
    
    <?php $this->endWidget(); ?>

</div><!-- form -->