<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	$model->username => array('/profile'),
	'Редактирование профиля',
);
?>
<div style="height: 12px;"></div>
<h2 class="underline">Изменить данные <?php echo $model->username; ?></h2>
<div style="height: 11px;"></div>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'cities'=>$cities,)); ?>