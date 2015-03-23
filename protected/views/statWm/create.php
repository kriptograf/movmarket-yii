<?php
/* @var $this StatWmController */
/* @var $model StatWm */

$this->breadcrumbs=array(
	'Stat Wms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatWm', 'url'=>array('index')),
	array('label'=>'Manage StatWm', 'url'=>array('admin')),
);
?>

<h1>Create StatWm</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>