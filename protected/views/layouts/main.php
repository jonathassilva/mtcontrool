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
						'brandLabel' => '<img src ="' . Yii::app ()->request->baseUrl . '/images/logo.png" />',
						'collapse' => true,
						'items' => array (
								array (
										'class' => 'bootstrap.widgets.TbNav',
										'items' => array (
												
                                                                                                array (
														'label' => 'Register',
                                                                                                                'icon' => 'icon-pencil icon-skyblue',
														'url' => array (
																'/users/register' 
														),
														'visible' => Yii::app ()->user->isGuest 
												),
                                                                                              
												
												
												array (
														'label' => 'User',
                                                                                                                'icon' => 'icon-pencil icon-white',
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
                                                                                                                                array(
                                                                                                                                                'label' => 'Change Password',
                                                                                                                                                'url' => array(
                                                                                                                                                                'site/changepassword'
                                                                                                                                                ),
                                                                                                                                                
                                                                                                                                    
                                                                                                                                )
														) 
												),
										                                                                                   
                                                                                    
                                                                                    
                                                                                    array (
														'label' => 'App',
                                                                                                                'icon' => 'icon-edit icon-white',
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
																		),'visible' => ! Yii::app ()->user->isGuest, 
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
												array (
														'label' => 'Runs',
                                                                                                                'icon' => 'icon-repeat icon-white',  
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
																		),'visible' => ! Yii::app ()->user->isGuest, 
																) 
														) 
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


        
        
</br></br></br></br>
	<div class="footer text-center">
                MTControol &copy; <?php echo date('Y'); ?> by UFAM.
                <br>

	</div>
	<!-- footer -->



	<!-- page -->

</body>
</html>
