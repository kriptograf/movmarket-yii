<?php
/* @var $this VipController */
/* @var $model Vip */

$this->breadcrumbs=array(
	'Vips'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vip', 'url'=>array('index')),
	array('label'=>'Manage Vip', 'url'=>array('admin')),
);
?>

<h1>Create Vip</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>