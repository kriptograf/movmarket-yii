<?php
/* @var $this VipController */
/* @var $model Vip */

$this->breadcrumbs=array(
	'Vips'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Vip', 'url'=>array('index')),
	array('label'=>'Create Vip', 'url'=>array('create')),
	array('label'=>'Update Vip', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vip', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vip', 'url'=>array('admin')),
);
?>

<h1>View Vip #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_board',
		'user_id',
		'kill_time',
		'pay',
	),
)); ?>
