<?php
/* @var $this StatWmController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stat Wms',
);

$this->menu=array(
	array('label'=>'Create StatWm', 'url'=>array('create')),
	array('label'=>'Manage StatWm', 'url'=>array('admin')),
);
?>

<h1>Stat Wms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
