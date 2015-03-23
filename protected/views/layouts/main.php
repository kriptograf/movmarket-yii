<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name='yandex-verification' content='4490a029a96f3fe6' />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/facebox.css" media="screen"  />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/signup.css" rel="stylesheet" type="text/css" />
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/facebox.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/signup.js" type="text/javascript"></script>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php if(Yii::app()->user->hasFlash('message')):?>
<script type="text/javascript">
jQuery.facebox('<?php echo Yii::app()->user->getFlash('message');?>');
setTimeout(function() {
    $('#facebox').fadeOut(600, function(){ $(this).remove();});
    $('#facebox_overlay').fadeOut(600, function(){ $(this).remove();});
}, 3000);
</script>
<?php endif;?>
<div class="container">
   <div class="row-fluid"> 
        <div id="header" class="span12">
            <div id="logo">
            	<a class="homelink" href="/"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            </div>
            <div class="box-add-top">
        		<?php echo CHtml::link('Добавить объявление',array('/board/create'),array('class'=>'btn btn-add btn-large'));?>
        	</div>
        	<div class="form-login">
            	<?php $this->widget('LoginWidget');?>
            </div>
        </div><!-- header -->
        
        
        
        <div class="clearfix"></div>
        
        <div id="mainmenu"  class="navbar">
            <div class="navbar-inner">
	            <?php $this->widget('zii.widgets.CMenu',array(
	            	'id'=>'top-menu',
	                'items'=>array(
	                    array('label'=>'Главная', 'url'=>'/', 'active'=>Yii::app()->controller->getId()=='site'),
	                    array('label'=>'Услуги', 'url'=>array('/pages/services')),
	                    array('label'=>'Правила размещения', 'url'=>array('/pages/rules')),
	                    array('label'=>'О проекте', 'url'=>array('/pages/about'), 'active'=>Yii::app()->controller->getId()=='about'),
	                    array('label'=>'Контакты', 'url'=>array('/contact'),'active'=>Yii::app()->controller->getId()=='contact'),
	                ),
	                'htmlOptions'=>array(
	                    'class'=>'nav',
	                ),
	            )); ?>
	            <div class="location">
	            	<?php $this->widget('LocationWidget');?>
	            </div>
            </div>
        </div><!-- mainmenu -->
       
        </div>
        
        <div class="row-fluid"> 
     
     	<!-- main content -->    
            <?php echo $content; ?>

        <!-- main content -->
          
	</div>
    
    
	<div class="clearfix"></div>

	<div id="footer">
		<div id="footer-left">
			<div class="one_fourth">
				<ul>
					<li class="widget-container">
						<h2 class="widget-title">Проект</h2>
						<ul>
							<li><?php echo CHtml::link('О проекте', Yii::app()->createUrl('/pages/about'));?></li>
							<li><?php echo CHtml::link('Услуги', Yii::app()->createUrl('/pages/services'));?></li>
						</ul>
					</li>
				</ul>
			</div><!-- end #one_fourth -->
			
			<div class="one_fourth">
				<ul>
					<li class="widget-container">
						<h2 class="widget-title">Клиентам</h2>
						<ul>
							<li><?php echo CHtml::link('Вход в систему', Yii::app()->createUrl('/login'));?></li>
							<li><?php echo CHtml::link('Контакты', Yii::app()->createUrl('/contact'));?></li>
						</ul>
					</li>
				</ul>
			</div><!-- end #one_fourth -->
			
			<div class="one_fourth">
				<ul>
					<li class="widget-container">
						<h2 class="widget-title">ЧаВо</h2>
						<ul>
							<li><?php echo CHtml::link('Правила размещения', Yii::app()->createUrl('/pages/rules'));?></li>
							<li><?php echo CHtml::link('ЧаВо', Yii::app()->createUrl('/pages/faq'));?></li>
						</ul>
					</li>
				</ul>
			</div><!-- end #one_fourth -->

		</div><!-- end #footer-left -->
	<div class="clear"></div>
	
	<div id="copyright">

            Copyright © 2012 <a href="http://moskvin-vitaliy.net">Moskvin Vitaliy</a>. Все права защищены.</div>
	<div class="clear"></div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>