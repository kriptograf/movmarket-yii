<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Board', 'url'=>array('index')),
	array('label'=>'Create Board', 'url'=>array('create')),
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Board', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
);
?>

<h1>View Board #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_category',
		'user_id',
		'type',
		'autor',
		'title',
		'email',
		'id_city',
		'url',
		'click',
		'contacts',
		'text',
		'price',
		'video',
		'hits',
		'checked',
		'top_time',
		'tags',
		'time_delete',
		'date_add',
		'vip',
		'highlight',
	),
)); ?>
