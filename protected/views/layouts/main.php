<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<?php Yii::app ()->bootstrap->register ();?>


<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/l.css" />

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/protected/extensions/bootstrap/assets/bootstrap.css" />
      
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
 <link rel="shortcut icon" href="/images/mtc.ico">
    



</head>

<body>
    
    
    
    <?php
				
				$this->widget ( 'bootstrap.widgets.TbNavbar', array (
						'color' => TbHtml::NAVBAR_COLOR_INVERSE,
						'brandLabel' => '<img src ="' . Yii::app ()->request->baseUrl . '/images/logo.png" />',
						'collapse' => true,
						'items' => array (
								array (
										'class' => 'bootstrap.widgets.TbNav',
										'items' => array (
												
												//array (
												//		'label' => 'Register Here',
                                                                                                //                'icon' => 'icon-pencil icon-white icon-center',
												//		'url' => array (
												//				'/users/register' 
												//		),
														
											//	),
												
												array (
														'label' => 'User',
                                                                                                                'icon' => 'icon-pencil',
														'url' => array (
																'/user' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
														'items' => array (
																array (
																		'label' => 'New User',
																		'url' => array (
																				'/users/create' 
																		),
                                                                                                                                   
																),
																array (
																		'label' => 'My Users',
																		'url' => array (
																				'/users/index' 
																		) 
																),
																array (
																		'label' => 'Manage Users',
																		'url' => array (
																				'/users/admin' 
																		),
																		'visible' => Yii::app ()->user->name === 'admin' 
																) 
														) 
												),
										                                                                                   
                                                                                    
                                                                                    
                                                                                    array (
														'label' => 'App',
                                                                                                                'icon' => 'icon-edit',
														'url' => array (
																'/app' 
														),
														'visible' => Yii::app ()->user->name == 'admin',
														'items' => array (
																array (
																		'label' => 'New App',
																		'url' => array (
																				'/app/create' 
																		) 
																),
																array (
																		'label' => 'My Apps',
																		'url' => array (
																				'/app/index' 
																		) 
																),
																array (
																		'label' => 'Manage Apps',
																		'url' => array (
																				'/app/admin' 
																		) 
																) 
														) 
												),
                                                                                                array (
														'label' => 'Manage',
                                                                                                                  'icon' => 'icon-wrench',
														'url' => array (
																'/manage' 
														),
														'visible' => Yii::app ()->user->name == 'admin',
														'items' => array (
																array (
																		'label' => 'Language',
                                                                                                                                                'icon' => 'icon-volume-up',
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Language',
																		'url' => array (
																				'/languages/create' 
																		) 
																),
																array (
																		'label' => 'My Languages',
																		'url' => array (
																				'/languages/index' 
																		) 
																),
																array (
																		'label' => 'Manage Languages',
																		'url' => array (
																				'/languages/admin' 
																		),
																		'visible' => Yii::app ()->user->name === 'admin' 
																) ) 
																),
                                                                                                                    
																array (
																		'label' => 'Criteria',
                                                                                                                                                'icon' => 'icon-align-justify',
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Criteria',
																		'url' => array (
																				'/criteria/create' 
																		) 
																),
																array (
																		'label' => 'My Criterias',
																		'url' => array (
																				'/criteria/index' 
																		) 
																),
																array (
																		'label' => 'Manage Criterias',
																		'url' => array (
																				'/criteria/admin' 
																		),
																		'visible' => Yii::app ()->user->name === 'admin' 
																) ) 
																),
                                                                                                                    
                                                                                                                            array (
																		'label' => 'Characteristic',
                                                                                                                                                'icon' => 'icon-list',
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Characteristic',
																		'url' => array (
																				'/characteristic/create' 
																		) 
																),
																array (
																		'label' => 'My Criterias',
																		'url' => array (
																				'/characteristic/index' 
																		) 
																),
																array (
																		'label' => 'Manage Criterias',
																		'url' => array (
																				'/characteristic/admin' 
																		),
																		'visible' => Yii::app ()->user->name === 'admin' 
																) ) 
																),
                                                                                                                    
                                                                                                                    array (
																		'label' => 'Platform',
                                                                                                                                                'icon' => 'icon-tasks',
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Platform',
																		'url' => array (
																				'/platforms/create' 
																		) 
																),
																array (
																		'label' => 'My Platforms',
																		'url' => array (
																				'/platforms/index' 
																		) 
																),
																array (
																		'label' => 'Manage Platforms',
																		'url' => array (
																				'/platforms/admin' 
																		),
																		'visible' => Yii::app ()->user->name === 'admin' 
																) ) 
																),
																
																)),
														 
                                                                                                   
                                                                                               
												array (
														'label' => 'Test Case',
                                                                                                                'icon' => 'icon-list-alt',
														'url' => array (
																'/testCase' 
														),
														'visible' => Yii::app ()->user->name == 'admin',
														'items' => array (
																array (
																		'label' => 'New Test Case',
																		'url' => array (
																				'/testCase/create' 
																		) 
																),
																array (
																		'label' => 'My Test Cases',
																		'url' => array (
																				'/testCase/index' 
																		) 
																),
																array (
																		'label' => 'Manage Test Cases',
																		'url' => array (
																				'/testCase/admin' 
																		) 
																) 
														) 
												),
												array (
														'label' => 'Runs',
                                                                                                                'icon' => 'icon-repeat',  
														'url' => array (
																'/runs' 
														),
														'visible' => Yii::app ()->user->name == 'admin',
														'items' => array (
																array (
																		'label' => 'New Run',
																		'url' => array (
																				'/runs/create' 
																		) 
																),
																array (
																		'label' => 'My Runs',
																		'url' => array (
																				'/runs/index' 
																		) 
																),
																array (
																		'label' => 'Manage Runs',
																		'url' => array (
																				'/runs/admin' 
																		) 
																) 
														) 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => Yii::app ()->user->name == 'admin' 
												),
												
												array (
														'label' => 'Login',
                                                                                                                'icon' => 'icon-arrow-right',
														'url' => array (
																'/site/login' 
														),
														'visible' => Yii::app ()->user->isGuest 
												),
												array (
														'label' => '' . Yii::app ()->user->name . '.',
                                                                                                                'icon' => 'icon-user',
														'visible' => ! Yii::app ()->user->isGuest,
														'items' => array (
																
																// array('label' => 'Action', 'url' => '#'),
																// array('label' => 'Another action', 'url' => '#'),
																array (
																		'label' => 'Logout (' . Yii::app ()->user->name . ')',
																		'url' => array (
																				'/site/logout' 
																		),
																		'visible' => ! Yii::app ()->user->isGuest 
																) 
														) 
												) 
										) 
								)
								 
						) 
				));
                               
                                
                                
				?>
    
   <!--
    
     <div class="container" style="max-width: 200px; padding: 0px 0; margin-left: 0px; margin-top: 20px; background-color: black; ">
    <div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Collapsible Group Item #1
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Collapsible Group Item #2
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
</div>
    </div>            
                </div>
-->


	<!-- 
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->



	<br />
	<br />
	<br />



	<!--    

    
    <div class="container" >
    <div class="row">
    <div class="span3">
        <div class="side-nav" >
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="#navs"><i class="icon-user"></i> Home</a></li>
            <li><a href="#navbar"><i class="icon-chevron-right"></i> My Apps</a></li>
            <li><a href="#breadcrumb"><i class="icon-plus"></i> New App</a></li>
            <li><a href="#herounit"><i class="icon-repeat"></i> In Progress Test</a></li>
            <li><a href="#gridview"><i class="icon-list-alt"></i> Reports</a></li>
            
        </ul>
    </div>
</div>
        <div class="span9">
        
        -->

	<!-- mainmenu -->

	<div class="container">
          
                
        <?php echo $content; ?>
	
            </div>


        
        
        </br></br>
	<div class="footer text-center">
            
                
              
              
            
                MTControol &copy; <?php echo date('Y'); ?> by UFAM.
                <br>All Rights Reserved.

	</div>
	<!-- footer -->



	<!-- page -->

</body>
</html>
