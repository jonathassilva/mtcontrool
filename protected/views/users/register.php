<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        

 
 <div class="infoblock shadow"><h1 style="color:#20B2AA;">Register User</h1></div>
<HR WIDTH=1180 ALIGN=LEFT >



<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'User'=>array('index'),
	'Register',
    ),
)); ?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>