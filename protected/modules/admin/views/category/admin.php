<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="content-box">
	<div class="box-body">
		
		<div class="box-header clear">
		<?php $this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'tabs clear'),
		));?>
			
			<h2>Управление категориями</h2>
		</div>
		
		<div class="box-wrap clear">
			<div id="data-table">
				<p>
				You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
				or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
				</p>			
				
				<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
				<div class="search-form" style="display:none">
					<?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>
				</div><!-- search-form -->
				
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'category-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						'id',
						'parent_id',
						'child',
						'name_cat',
						'description',
						'img',
						/*
						'sort_index',
						*/
						array(
							'class'=>'CButtonColumn',
						),
					),
					'itemsCssClass'=>'style1 datatable',
				)); ?>
			</div>
			
		</div>
	</div>
</div>