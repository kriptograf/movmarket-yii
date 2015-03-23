<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('app', 'Boards'),
);
?>

<h1><?php Yii::t('app', 'All Boards');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
