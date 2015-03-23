<?php
/* @var $this CompanyCategoryController */
/* @var $model CompanyCategory */

$this->breadcrumbs=array(
	'Company Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CompanyCategory', 'url'=>array('index')),
	array('label'=>'Manage CompanyCategory', 'url'=>array('admin')),
);
?>

<h1>Create CompanyCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>