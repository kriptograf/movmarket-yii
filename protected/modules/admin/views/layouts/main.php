<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/reset.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/fancybox.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/jquery.wysiwyg.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/jquery.ui.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/visualize.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/visualize-light.css" type="text/css"/>
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ie7.css" />
	<![endif]-->	

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.visualize.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/tiny_mce/jquery.tinymce.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.idtabs.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.datatables.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.jeditable.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.ui.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.jcarousel.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.validate.js"></script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/excanvas.js"></script>
	
	
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="pagetop">
	<div class="head pagesize"> <!-- *** head layout *** -->
		<div class="head_top">
			<div class="topbuts">
				<ul class="clear">
					<li><a href="<?php echo Yii::app()->createUrl('/site/index');?>" target="_blank">Открыть сайт</a></li>
					<li><a href="#">Messages</a></li>
					<li><a href="#">Settings</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('/site/logout');?>" class="red">Выйти</a></li>
				</ul>
				
				<div class="user clear">
					<span class="user-detail">
						<span class="name">Hello, <?php echo Yii::app()->user->username;?></span>
						<span class="text">Вы вошли как admin</span>
						<span class="text">У вас <a href="#">5 уведомлений</a></span>
					</span>
				</div>
			</div>
			
			<div class="logo clear">
				<a href="/" title="View dashboard">
					<span class="textlogo">
						<span class="title"><?php echo CHtml::encode(Yii::app()->name); ?></span>
						<span class="text">Панель управления</span>
					</span>
				</a>
			</div>
		</div>
		
		<div id="mainmenu" class="menu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Категории', 'url'=>array('/admin/category')),
					array('label'=>'Фильтры', 'url'=>array('/admin/types')),
					array('label'=>'Объявления', 'url'=>array('/admin/board')),
					array('label'=>'Пользователи', 'url'=>array('/admin/user')),
					array('label'=>'Города', 'url'=>array('/admin/city')),
					array('label'=>'Новости', 'url'=>array('/admin/news')),
					array('label'=>'Страницы', 'url'=>array('/admin/pages')),
					array('label'=>'Баннеры', 'url'=>array('/admin/banners')),
				),
				'htmlOptions'=>array('class'=>'clear'),
			)); ?>
		</div><!-- mainmenu -->
	</div>
</div>

<div class="breadcrumb">
	<div class="bread-links pagesize">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>CHtml::link('Главная',Yii::app()->homeUrl),
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	</div>
</div>

	
	
	<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
		
			<?php echo $content; ?>

			
			
		</div><!-- end of page -->
	</div>
</div>
	

	<div id="footer" class="footer">
		<div class="pagesize clear">
			Copyright &copy; <?php echo date('Y'); ?> by moskvin-vitaliy.net<br/>
			Все права защищены.<br/>
		</div>
	</div><!-- footer -->



</body>
</html>