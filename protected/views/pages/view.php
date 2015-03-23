<?php
/* @var $this PagesController */
/* @var $model Pages */
//метатеги
$cs = Yii::app()->getClientScript();
$cs->registerMetaTag($model->descr,'Description');
$cs->registerMetaTag($model->keywords,'Keywords');
//тайтл страницы
$this->pageTitle=Yii::app()->name . ' - '.$model->title;
//хлебные крошки
$this->breadcrumbs=array(
	$model->title,
);
?>
<div style="height: 12px;"></div>
<h2 class="underline"><?php echo $model->title; ?></h2>
<div style="height: 11px;"></div>

<div>
<?php echo $model->text;?>
</div>

