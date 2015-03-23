<?php
/* @var $this StatWmController */
/* @var $model StatWm */

$this->breadcrumbs=array(
	'Stat Wms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatWm', 'url'=>array('index')),
	array('label'=>'Create StatWm', 'url'=>array('create')),
	array('label'=>'View StatWm', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatWm', 'url'=>array('admin')),
);
?>

<h1>Update StatWm <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>