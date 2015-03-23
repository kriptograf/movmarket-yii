<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	//'Profiles'=>array('index'),
	$model->username,
);
?>
<div style="height: 11px;"></div>
<h2 class="underline">Личный кабинет</h2>
<div style="height: 11px;"></div>
<h4 class="well">Персональные данные <?php echo CHtml::link(CHtml::image('/images/edit.png','edit'),Yii::app()->createUrl('/profile/edit'), array('title'=>'Редактировать', 'class'=>'right'))?></h4>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'phone',
		'city.name',
	),
	'htmlOptions'=>array('class'=>'table'),
)); ?>
