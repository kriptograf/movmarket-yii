<?php
/* @var $this CompanyCategoryController */
/* @var $model CompanyCategory */

$this->breadcrumbs=array(
	'Company Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CompanyCategory', 'url'=>array('index')),
	array('label'=>'Create CompanyCategory', 'url'=>array('create')),
	array('label'=>'View CompanyCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CompanyCategory', 'url'=>array('admin')),
);
?>

<h1>Update CompanyCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>