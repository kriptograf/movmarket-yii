<?php
/* @var $this StatWmController */
/* @var $model StatWm */

$this->breadcrumbs=array(
	'Stat Wms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatWm', 'url'=>array('index')),
	array('label'=>'Create StatWm', 'url'=>array('create')),
	array('label'=>'Update StatWm', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatWm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatWm', 'url'=>array('admin')),
);
?>

<h1>View StatWm #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'purse',
		'wmid',
		'type',
		'completed',
		'id_board',
		'date',
	),
)); ?>
