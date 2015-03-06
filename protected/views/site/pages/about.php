<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<?php echo TbHtml::icon(TbHtml::ICON_HEART); ?>
<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    
    'links' => array(
        'About' => array('/site/page', 'view'=>'about'),
        
    ),
)); ?>
<h1>About</h1>

<p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p>








<div class="well" style="max-width: 340px; padding: 8px 0;">
    <?php echo TbHtml::navList(array(
        array('label' => 'List header'),
        array('label' => 'Home', 'url' => '#', 'active' => true),
        array('label' => 'Library', 'url' => '#'),
        array('label' => 'Applications', 'url' => '#'),
        array('label' => 'Another list header'),
        array('label' => 'Profile', 'url' => '#'),
        array('label' => 'Settings', 'url' => '#'),
        TbHtml::menuDivider(),
        array('label' => 'Help', 'url' => '#'),
    )); ?>
</div>


