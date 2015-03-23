<?php
/* @var $this BoardController */
/* @var $model Board */
$this->pageTitle=Yii::app()->name . ' - Редактирование объявления';
$this->breadcrumbs=array(
	Yii::t('app', 'Boards')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);
?>
<div style="height: 11px;"></div>
<h2 class="underline"><?php echo Yii::t('app', 'Update Board');?> - <?php echo $model->title; ?></h2>
<p></p>
<?php echo $this->renderPartial('_update', array(
			'model'=>$model,
			'category'=>$category,
			'country'=>$country,
			'regions'=>$regions,
			'categorySelectData' => Category::model()->getAllCategoriesForSelect(),
)); ?>