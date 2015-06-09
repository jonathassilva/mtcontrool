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
      


    
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

         <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>   
         
         
         <link href="/protected//extensions/star-rating/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/protected/extensions/star-rating/js/star-rating.min.js" type="text/javascript"></script>
    
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    

<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/mtc.ico" type="image/x-icon" />

    



</head>

<body>
    
    <?php
    $admin = (isset(Yii::app()->user->level) and Yii::app()->user->level == 'ADMIN') ? true : false ;


				
				$this->widget ( 'bootstrap.widgets.TbNavbar', array (
						'color' => TbHtml::NAVBAR_COLOR_INVERSE,
						'brandLabel' => '<img src ="' . Yii::app ()->request->baseUrl . '/images/logo.png" /><img src ="' . Yii::app ()->request->baseUrl . '/images/preto.png" />',
						'collapse' => true,
						'items' => array (
								array (
										'class' => 'bootstrap.widgets.TbNav',
										'items' => array (
												
                                                                                                array (
														'label' => 'Register',
                                                                                                                'icon' => 'fa fa-user-plus',
														'url' => array (
																'/users/register' 
														),
														'visible' => Yii::app ()->user->isGuest 
												),
                                                                                              
												
												
												array (
														'label' => 'User',
                                                                                                                'icon' => 'icon-user icon-white',
														'url' => array (
																'/user' 
														),
														'visible'=>(Yii::app()->user->isAdmin()),
														'items' => array (
																array (
																		'label' => 'New User',
																		'url' => array (
																				'/users/create' 
																		),
                                                                                                                                   
																),
																
																array (
																		'label' => 'Manage Users',
																		'url' => array (
																				'/users/admin' 
																		),
																		'visible'=>(Yii::app()->user->isAdmin()), 
																),
                                                                                                                             /*   array(
                                                                                                                                                'label' => 'Change Password',
                                                                                                                                                'url' => array(
                                                                                                                                                                '/users/changepassword'
                                                                                                                                                ),'visible' => ! Yii::app ()->user->isGuest,
                                                                                                                                                
                                                                                                                                    
                                                                                                                                )*/
														) 
												),
										                                                                                   
                                                                                    
                                                                                    
                                                                                    array (
														'label' => 'App',
                                                                                                                'icon' => 'fa fa-mobile fa-lg',
														'url' => array (
																'/app' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
														'items' => array (
																array (
																		'label' => 'New App',
																		'url' => array (
																				'/app/create' 
																		),'visible' => ! Yii::app ()->user->isGuest,
																),
																
																array (
																		'label' => 'Manage Apps',
																		'url' => array (
																				'/app/admin' 
																		),'visible' => (Yii::app()->user->isTester()), 
																), 
                                                                                                                                array (
																		'label' => 'Manage Apps',
																		'url' => array (
																				'/app/manage' 
																		),'visible' => (Yii::app()->user->isAdmin()), 
																) 
														) 
												),
                                                                                                array (
														'label' => 'Manage',
                                                                                                                  'icon' => 'icon-wrench icon-white',
														'url' => array (
																'/manage' 
														),
														'visible'=>(Yii::app()->user->isAdmin()),
														'items' => array (
																array (
																		'label' => 'Language',
                                                                                                                                                'icon' => 'icon-volume-up icon-white',
                                                                                                                                                'visible'=>(Yii::app()->user->isAdmin()),
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Language',
																		'url' => array (
																				'/languages/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()),
																),
																
																array (
																		'label' => 'Manage Languages',
																		'url' => array (
																				'/languages/admin' 
																		),
																		'visible'=>(Yii::app()->user->isAdmin()),
																) ) 
																),
                                                                                                                    
																array (
																		'label' => 'Criteria',
                                                                                                                                                'icon' => 'icon-align-justify icon-white',
                                                                                                                                                'visible'=>(Yii::app()->user->isAdmin()),
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Criteria',
																		'url' => array (
																				'/criteria/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																),
																
																array (
																		'label' => 'Manage Criterias',
																		'url' => array (
																				'/criteria/admin' 
																		),
																		'visible'=>(Yii::app()->user->isAdmin()), 
																) ) 
																),
                                                                                                                    
                                                                                                                            array (
																		'label' => 'Characteristic',
                                                                                                                                                'icon' => 'icon-list icon-white',
                                                                                                                                                'visible'=>(Yii::app()->user->isAdmin()),
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Characteristic',
																		'url' => array (
																				'/characteristic/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																),
																
																array (
																		'label' => 'Manage Characteristics',
																		'url' => array (
																				'/characteristic/admin' 
																		),
																		'visible'=>(Yii::app()->user->isAdmin()), 
																) ) 
																),
                                                                                                                    
                                                                                                                    array (
																		'label' => 'Platform',
                                                                                                                                                'icon' => 'icon-tasks icon-white',
                                                                                                                                                'visible'=>(Yii::app()->user->isAdmin()),
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Platform',
																		'url' => array (
																				'/platforms/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																),
																
																array (
																		'label' => 'Manage Platforms',
																		'url' => array (
																				'/platforms/admin' 
																		),
																		'visible'=>(Yii::app()->user->isAdmin()),
																) ) 
																),
																
                                                                                                                    
                                                                                                                    array (
																		'label' => 'Category',
                                                                                                                                                'icon' => 'icon-asterisk icon-white',
                                                                                                                                                'visible'=>(Yii::app()->user->isAdmin()),
																		                                                                                                                                                'items' => array (
																array (
																		'label' => 'New Category',
																		'url' => array (
																				'/category/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																),
																
																array (
																		'label' => 'Manage Categories',
																		'url' => array (
																				'/category/admin' 
																		),
																		'visible'=>(Yii::app()->user->isAdmin()),
																) ) 
																),
																//INICIO BRAND
															/*	array ('label' => 'Brand',
                                                                       'icon' => 'icon-asterisk icon-white',
                                                                       'visible'=>(Yii::app()->user->isAdmin()),
																	   'items' => array (
																			array ('label' => 'New Brand',
																				   'url' => array ('/brand/create'),
																				   'visible'=>(Yii::app()->user->isAdmin()), 
																			),
																			array ('label' => 'Manage Brands',
																				   'url' => array ('/brand/admin'),
																					'visible'=>(Yii::app()->user->isAdmin()),
																			) 
																		) 
																),
																//FIM BRAND
																//INICIO DEVICE
																array ('label' => 'Device',
                                                                       'icon' => 'icon-asterisk icon-white',
                                                                       'visible'=>(Yii::app()->user->isAdmin()),
																	   'items' => array (
																			array ('label' => 'New Device',
																				   'url' => array ('/device/create'),
																				   'visible'=>(Yii::app()->user->isAdmin()), 
																			),
																			array ('label' => 'Manage Devices',
																				   'url' => array ('/device/admin'),
																					'visible'=>(Yii::app()->user->isAdmin()),
																			) 
																		) 
																),
																//FIM DEVICE
																//INICIO ELEMENT
																array ('label' => 'Element',
                                                                       'icon' => 'icon-asterisk icon-white',
                                                                       'visible'=>(Yii::app()->user->isAdmin()),
																	   'items' => array (
																			array ('label' => 'New Element',
																				   'url' => array ('/element/create'),
																				   'visible'=>(Yii::app()->user->isAdmin()), 
																			),
																			array ('label' => 'Manage Elements',
																				   'url' => array ('/element/admin'),
																					'visible'=>(Yii::app()->user->isAdmin()),
																			) 
																		) 
																),
															*/	//FIM ELEMENT
																)),
														 
                                                                                                   
                                                                                               
												array (
														'label' => 'Test Case',
                                                                                                                'icon' => 'icon-list-alt icon-white',
														'url' => array (
																'/testCase' 
														),
														'visible'=>(Yii::app()->user->isAdmin()),
														'items' => array (
																array (
																		'label' => 'New Test Case',
																		'url' => array (
																				'/testCase/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()),
																),
																
																array (
																		'label' => 'Manage Test Cases',
																		'url' => array (
																				'/testCase/admin' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																) 
														) 
												),
												//INICIO TEST CONTEXT
											/*	array (
														'label' => 'Test Context',
                                                                                                                'icon' => 'icon-list-alt icon-white',
														'url' => array (
																'/testContext' 
														),
														'visible'=>(Yii::app()->user->isAdmin()),
														'items' => array (
																array (
																		'label' => 'New Test Context',
																		'url' => array (
																				'/testContext/create' 
																		),'visible'=>(Yii::app()->user->isAdmin()),
																),
																
																array (
																		'label' => 'Manage Test Cantext',
																		'url' => array (
																				'/testContext/admin' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																) 
														) 
												),*/
												//FIM TEST CONTEXT
												
												array (
														'label' => 'Runs',
                                                                                                                'icon' => 'fa fa-refresh',  
														'url' => array (
																'/runs' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
														'items' => array (
																array (
																		'label' => 'New Run',
																		'url' => array (
																				'/runs/create' 
																		),'visible' => ! Yii::app ()->user->isGuest, 
																),
																
																array (
																		'label' => 'Manage Runs',
																		'url' => array (
																				'/runs/admin' 
																		),'visible'=>(Yii::app()->user->isAdmin()), 
																) 
														) 
												),
												/*array (
														'label' => 'Dashboard',
                                                                                                                'icon' => 'icon-eye-open icon-white', 
														'url' => array (
																'/runs/index' 
														),
														'visible' => ! Yii::app ()->user->isGuest, 
												),*/
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
												),
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
												),
												
												
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => ! Yii::app ()->user->isGuest, 
												),
												
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => ! Yii::app ()->user->isGuest,
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible' => ! Yii::app ()->user->isGuest, 
												),
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
												
												array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
												
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                array (
														'label' => '',
														'url' => array (
																'#' 
														),
														'visible'=>(Yii::app()->user->isTester()),
												),
                                                                                    
                                                                                                
                                                                                                
                                                                                    
                                                                                               
                                                                                    
                                                                                                
												
												array (
														'label' => 'Login',
                                                                                                                'icon' => 'icon-arrow-right icon-white',
														'url' => array (
																'/site/login' 
														),
														'visible' => Yii::app ()->user->isGuest,
												),
												array (
														'label' => '' . Yii::app ()->user->name,
                                                                                                                'icon' => 'icon-user icon-skyblue',
														'visible' => ! Yii::app ()->user->isGuest,
														'items' => array (
																
																// array('label' => 'Action', 'url' => '#'),
																// array('label' => 'Another action', 'url' => '#'),
                                                                                                                                 array(
                                                                                                                                                'label' => 'Edit Profile',
                                                                                                                                                'icon'=>'fa fa-pencil-square-o',
                                                                                                                                                'url' => array(
                                                                                                                                                                '/users/profile'
                                                                                                                                                ),'visible' => ! Yii::app ()->user->isGuest,
                                                                                                                                                
                                                                                                                                    
                                                                                                                                ), 
                                                                                                                                array(
                                                                                                                                                'label' => 'Change Password',
                                                                                                                                                'icon'=>'fa fa-key',
                                                                                                                                                'url' => array(
                                                                                                                                                                '/users/changepassword'
                                                                                                                                                ),'visible' => ! Yii::app ()->user->isGuest,
                                                                                                                                                
                                                                                                                                    
                                                                                                                                ),    
                                                                                                                                array (
																		'label' => 'Logout (' . Yii::app ()->user->name . ')',
                                                                                                                                                
																		'url' => array (
																				'/site/logout' 
																		),
																		'visible' => ! Yii::app ()->user->isGuest 
																),
                                                                                                                   
														) 
												) 
										) 
								)
								 
						) 
				));
                               
                                
                                
				?>
    
   


	<!-- 
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->



	<br />
	<br />
	<br/>



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


        
        
</body>
</html>

	<div class="footer text-center">
             
            
            <!-- Social Footer, Colour Matching Icons -->
<!-- Include Font Awesome Stylesheet in Header -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- // -->
<div class="container-footer">
   

        <div class="text-center center-block">
            <p class="txt-railway">- Sponsor - | - Development -</p>
       
                <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/INDT_pref_color.png","indt",array( 'width'=>'100px','height'=>'100px')); ?> 
            
              <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/logo_experts.png","indt",array( 'width'=>'100px','height'=>'100px')); ?> 
             <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/ufam-ufam.png","indt",array( 'width'=>'50px','height'=>'50px')); ?> 
        </div>
           
    <!--   <br/>
     <p class="txt-railway"> MTControol &copy; <?php// echo date('Y'); ?> by UFAM. </p>    -->
</div>

</div>  <br>

	</div>
	<!-- footer -->



	<!-- page -->

