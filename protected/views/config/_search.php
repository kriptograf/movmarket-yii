<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'board_works'); ?>
		<?php echo $form->textField($model,'board_works',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_new_ads'); ?>
		<?php echo $form->textField($model,'add_new_ads',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_new_news'); ?>
		<?php echo $form->textField($model,'add_new_news',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cache_clear'); ?>
		<?php echo $form->textField($model,'cache_clear',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scache'); ?>
		<?php echo $form->textField($model,'scache'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scache_expire'); ?>
		<?php echo $form->textField($model,'scache_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scache_exp_expire'); ?>
		<?php echo $form->textField($model,'scache_exp_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kcache'); ?>
		<?php echo $form->textField($model,'kcache'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_new_only_user'); ?>
		<?php echo $form->textField($model,'add_new_only_user',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'money_service'); ?>
		<?php echo $form->textField($model,'money_service',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'top_status_days'); ?>
		<?php echo $form->textField($model,'top_status_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'top_prefix'); ?>
		<?php echo $form->textField($model,'top_prefix',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'top_price'); ?>
		<?php echo $form->textField($model,'top_price',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'top_number'); ?>
		<?php echo $form->textField($model,'top_number',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'select_status_days'); ?>
		<?php echo $form->textField($model,'select_status_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'select_prefix'); ?>
		<?php echo $form->textField($model,'select_prefix',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'select_price'); ?>
		<?php echo $form->textField($model,'select_price',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'select_number'); ?>
		<?php echo $form->textField($model,'select_number',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wm_money_service'); ?>
		<?php echo $form->textField($model,'wm_money_service',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wm_mode'); ?>
		<?php echo $form->textField($model,'wm_mode',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wm_purse'); ?>
		<?php echo $form->textField($model,'wm_purse',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wm_type'); ?>
		<?php echo $form->textField($model,'wm_type',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmprice_vip'); ?>
		<?php echo $form->textField($model,'wmprice_vip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmprice_select'); ?>
		<?php echo $form->textField($model,'wmprice_select'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subscribe_theme'); ?>
		<?php echo $form->textField($model,'subscribe_theme',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subscribe_text'); ?>
		<?php echo $form->textArea($model,'subscribe_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subscribe_from'); ?>
		<?php echo $form->textField($model,'subscribe_from',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subscribe_limit'); ?>
		<?php echo $form->textField($model,'subscribe_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subscribe_sleep'); ?>
		<?php echo $form->textField($model,'subscribe_sleep'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'view_nonactiv_contacts'); ?>
		<?php echo $form->textField($model,'view_nonactiv_contacts',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_symb_autor'); ?>
		<?php echo $form->textField($model,'count_symb_autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_symb_title'); ?>
		<?php echo $form->textField($model,'count_symb_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_symb_url'); ?>
		<?php echo $form->textField($model,'count_symb_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_symb_contacts'); ?>
		<?php echo $form->textField($model,'count_symb_contacts'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_symb_text'); ?>
		<?php echo $form->textField($model,'count_symb_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_adv_on_index'); ?>
		<?php echo $form->textField($model,'count_adv_on_index'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags_generate'); ?>
		<?php echo $form->textField($model,'tags_generate',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kaleidoscope'); ?>
		<?php echo $form->textField($model,'kaleidoscope',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_show_img_kaleidoscope'); ?>
		<?php echo $form->textField($model,'count_show_img_kaleidoscope'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_url'); ?>
		<?php echo $form->textField($model,'add_url',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'view_comments'); ?>
		<?php echo $form->textField($model,'view_comments',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clouds_tags'); ?>
		<?php echo $form->textField($model,'clouds_tags',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_comments'); ?>
		<?php echo $form->textField($model,'add_comments',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stop_words'); ?>
		<?php echo $form->textArea($model,'stop_words',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'upl_image_size'); ?>
		<?php echo $form->textField($model,'upl_image_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mail_friends'); ?>
		<?php echo $form->textField($model,'mail_friends',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_mail'); ?>
		<?php echo $form->textField($model,'admin_mail',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_keywords'); ?>
		<?php echo $form->textField($model,'print_keywords',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_vip'); ?>
		<?php echo $form->textField($model,'print_vip',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_print_vip'); ?>
		<?php echo $form->textField($model,'count_print_vip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_news'); ?>
		<?php echo $form->textField($model,'print_news',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_print_news'); ?>
		<?php echo $form->textField($model,'count_print_news'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_news_in_page'); ?>
		<?php echo $form->textField($model,'count_news_in_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_stat'); ?>
		<?php echo $form->textField($model,'print_stat',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'limit_pagination_on_page'); ?>
		<?php echo $form->textField($model,'limit_pagination_on_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mail_about_new_mess'); ?>
		<?php echo $form->textField($model,'mail_about_new_mess',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'upload_images'); ?>
		<?php echo $form->textField($model,'upload_images',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_images_for_users'); ?>
		<?php echo $form->textField($model,'count_images_for_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width_small_images'); ?>
		<?php echo $form->textField($model,'width_small_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width_normal_images'); ?>
		<?php echo $form->textField($model,'width_normal_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width_cat_images'); ?>
		<?php echo $form->textField($model,'width_cat_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width_news_images'); ?>
		<?php echo $form->textField($model,'width_news_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_link_to_video'); ?>
		<?php echo $form->textField($model,'add_link_to_video',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'captcha'); ?>
		<?php echo $form->textField($model,'captcha',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edit_message'); ?>
		<?php echo $form->textField($model,'edit_message',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edit_comments'); ?>
		<?php echo $form->textField($model,'edit_comments',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anti_link'); ?>
		<?php echo $form->textField($model,'anti_link',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_for_notice_autor'); ?>
		<?php echo $form->textField($model,'day_for_notice_autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_title'); ?>
		<?php echo $form->textField($model,'user_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_keywords'); ?>
		<?php echo $form->textArea($model,'user_keywords',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_description'); ?>
		<?php echo $form->textArea($model,'user_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->