<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Create Config', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('config-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Configs</h1>

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
	'id'=>'config-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'board_works',
		'add_new_ads',
		'add_new_news',
		'id',
		'cache_clear',
		'scache',
		/*
		'scache_expire',
		'scache_exp_expire',
		'kcache',
		'add_new_only_user',
		'money_service',
		'top_status_days',
		'top_prefix',
		'top_price',
		'top_number',
		'select_status_days',
		'select_prefix',
		'select_price',
		'select_number',
		'wm_money_service',
		'wm_mode',
		'wm_purse',
		'wm_type',
		'wmprice_vip',
		'wmprice_select',
		'subscribe_theme',
		'subscribe_text',
		'subscribe_from',
		'subscribe_limit',
		'subscribe_sleep',
		'view_nonactiv_contacts',
		'count_symb_autor',
		'count_symb_title',
		'count_symb_url',
		'count_symb_contacts',
		'count_symb_text',
		'count_adv_on_index',
		'tags_generate',
		'kaleidoscope',
		'count_show_img_kaleidoscope',
		'add_url',
		'view_comments',
		'clouds_tags',
		'add_comments',
		'stop_words',
		'upl_image_size',
		'mail_friends',
		'admin_mail',
		'print_keywords',
		'print_vip',
		'count_print_vip',
		'print_news',
		'count_print_news',
		'count_news_in_page',
		'print_stat',
		'limit_pagination_on_page',
		'mail_about_new_mess',
		'upload_images',
		'count_images_for_users',
		'width_small_images',
		'width_normal_images',
		'width_cat_images',
		'width_news_images',
		'add_link_to_video',
		'captcha',
		'edit_message',
		'edit_comments',
		'anti_link',
		'day_for_notice_autor',
		'user_title',
		'user_keywords',
		'user_description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
