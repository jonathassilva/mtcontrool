<?php   
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'MTControol',
    
     
    // 'theme'=>'freelancer',

        'aliases'=>array(
          'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), 
        ),
    
    
	// preloading 'log' component
	'preload'=>array('log','bootstrap'),
		
	// autoloading model and component classes
	'import' => array (
    
            
			'application.models.*',
			'application.components.*',
			'bootstrap.helpers.TbHtml',
			'bootstrap.helpers.TbArray',
			'bootstrap.behaviors.TbWidget',
			'bootstrap.widgets.*'
                       
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'mtcontrool',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                            'bootstrap.gii',
                        ),
		),
		
	),

	// application components
	'components'=>array(
                'bootstrap'=>array(
                    'class'=>'bootstrap.components.TbApi',
                ),
            
            
            
		'user'=>array(
			'class'=>'application.components.EWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                   // 'autoUpdateFlash' => false,
		),
            
            'clientScript' => array(
         'scriptMap' => array(
            'jquery.js' => false,
            'jquery.min.js' => false,
         ),
      ),
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
                    
			'urlFormat'=>'path',
			'rules'=>array(
                                
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
                    
                    
		),
            'Smtpmail'=>array(
			'class'=>'application.extensions.smtpmail.PHPMailer',
			'Host'=>'smtp.gmail.com',
			'Username'=>'sistemas@icomp.ufam.edu.br',
			'Password'=>'Si102030',
			'Mailer'=>'smtp',
			'Port'=>465,
			'SMTPSecure'=>'ssl',
			'SMTPAuth'=>true,
		),
                /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                 * 
                 */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
            'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=mtcontrool',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=> 'trace, info, error, warning, vardump'
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace, info, error, warning, vardump',
					'categories'=>'',
					'showInFireBug'=>true,
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ayeka.juh@gmail.com',
	),
);