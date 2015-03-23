<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Управление категориями'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирование',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'categories'=>$categories,'manage_menu'=>$manage_menu)); ?>