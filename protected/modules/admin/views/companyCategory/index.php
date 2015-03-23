<?php
/* @var $this CompanyCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Company Categories',
);

$this->menu=array(
	array('label'=>'Create CompanyCategory', 'url'=>array('create')),
	array('label'=>'Manage CompanyCategory', 'url'=>array('admin')),
);
?>

<h1>Company Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
