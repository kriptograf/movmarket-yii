<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'board_works'); ?>
		<?php echo $form->textField($model,'board_works',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'board_works'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_new_ads'); ?>
		<?php echo $form->textField($model,'add_new_ads',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'add_new_ads'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_new_news'); ?>
		<?php echo $form->textField($model,'add_new_news',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'add_new_news'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cache_clear'); ?>
		<?php echo $form->textField($model,'cache_clear',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cache_clear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scache'); ?>
		<?php echo $form->textField($model,'scache'); ?>
		<?php echo $form->error($model,'scache'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scache_expire'); ?>
		<?php echo $form->textField($model,'scache_expire'); ?>
		<?php echo $form->error($model,'scache_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scache_exp_expire'); ?>
		<?php echo $form->textField($model,'scache_exp_expire'); ?>
		<?php echo $form->error($model,'scache_exp_expire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kcache'); ?>
		<?php echo $form->textField($model,'kcache'); ?>
		<?php echo $form->error($model,'kcache'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_new_only_user'); ?>
		<?php echo $form->textField($model,'add_new_only_user',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'add_new_only_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'money_service'); ?>
		<?php echo $form->textField($model,'money_service',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'money_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_status_days'); ?>
		<?php echo $form->textField($model,'top_status_days'); ?>
		<?php echo $form->error($model,'top_status_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_prefix'); ?>
		<?php echo $form->textField($model,'top_prefix',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'top_prefix'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_price'); ?>
		<?php echo $form->textField($model,'top_price',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'top_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_number'); ?>
		<?php echo $form->textField($model,'top_number',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'top_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'select_status_days'); ?>
		<?php echo $form->textField($model,'select_status_days'); ?>
		<?php echo $form->error($model,'select_status_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'select_prefix'); ?>
		<?php echo $form->textField($model,'select_prefix',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'select_prefix'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'select_price'); ?>
		<?php echo $form->textField($model,'select_price',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'select_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'select_number'); ?>
		<?php echo $form->textField($model,'select_number',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'select_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wm_money_service'); ?>
		<?php echo $form->textField($model,'wm_money_service',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'wm_money_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wm_mode'); ?>
		<?php echo $form->textField($model,'wm_mode',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'wm_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wm_purse'); ?>
		<?php echo $form->textField($model,'wm_purse',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'wm_purse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wm_type'); ?>
		<?php echo $form->textField($model,'wm_type',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'wm_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmprice_vip'); ?>
		<?php echo $form->textField($model,'wmprice_vip'); ?>
		<?php echo $form->error($model,'wmprice_vip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmprice_select'); ?>
		<?php echo $form->textField($model,'wmprice_select'); ?>
		<?php echo $form->error($model,'wmprice_select'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscribe_theme'); ?>
		<?php echo $form->textField($model,'subscribe_theme',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subscribe_theme'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscribe_text'); ?>
		<?php echo $form->textArea($model,'subscribe_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'subscribe_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscribe_from'); ?>
		<?php echo $form->textField($model,'subscribe_from',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subscribe_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscribe_limit'); ?>
		<?php echo $form->textField($model,'subscribe_limit'); ?>
		<?php echo $form->error($model,'subscribe_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscribe_sleep'); ?>
		<?php echo $form->textField($model,'subscribe_sleep'); ?>
		<?php echo $form->error($model,'subscribe_sleep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_nonactiv_contacts'); ?>
		<?php echo $form->textField($model,'view_nonactiv_contacts',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'view_nonactiv_contacts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_symb_autor'); ?>
		<?php echo $form->textField($model,'count_symb_autor'); ?>
		<?php echo $form->error($model,'count_symb_autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_symb_title'); ?>
		<?php echo $form->textField($model,'count_symb_title'); ?>
		<?php echo $form->error($model,'count_symb_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_symb_url'); ?>
		<?php echo $form->textField($model,'count_symb_url'); ?>
		<?php echo $form->error($model,'count_symb_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_symb_contacts'); ?>
		<?php echo $form->textField($model,'count_symb_contacts'); ?>
		<?php echo $form->error($model,'count_symb_contacts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_symb_text'); ?>
		<?php echo $form->textField($model,'count_symb_text'); ?>
		<?php echo $form->error($model,'count_symb_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_adv_on_index'); ?>
		<?php echo $form->textField($model,'count_adv_on_index'); ?>
		<?php echo $form->error($model,'count_adv_on_index'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags_generate'); ?>
		<?php echo $form->textField($model,'tags_generate',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'tags_generate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kaleidoscope'); ?>
		<?php echo $form->textField($model,'kaleidoscope',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'kaleidoscope'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_show_img_kaleidoscope'); ?>
		<?php echo $form->textField($model,'count_show_img_kaleidoscope'); ?>
		<?php echo $form->error($model,'count_show_img_kaleidoscope'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_url'); ?>
		<?php echo $form->textField($model,'add_url',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'add_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_comments'); ?>
		<?php echo $form->textField($model,'view_comments',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'view_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clouds_tags'); ?>
		<?php echo $form->textField($model,'clouds_tags',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'clouds_tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_comments'); ?>
		<?php echo $form->textField($model,'add_comments',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'add_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stop_words'); ?>
		<?php echo $form->textArea($model,'stop_words',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'stop_words'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upl_image_size'); ?>
		<?php echo $form->textField($model,'upl_image_size'); ?>
		<?php echo $form->error($model,'upl_image_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail_friends'); ?>
		<?php echo $form->textField($model,'mail_friends',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'mail_friends'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_mail'); ?>
		<?php echo $form->textField($model,'admin_mail',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'admin_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_keywords'); ?>
		<?php echo $form->textField($model,'print_keywords',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'print_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_vip'); ?>
		<?php echo $form->textField($model,'print_vip',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'print_vip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_print_vip'); ?>
		<?php echo $form->textField($model,'count_print_vip'); ?>
		<?php echo $form->error($model,'count_print_vip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_news'); ?>
		<?php echo $form->textField($model,'print_news',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'print_news'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_print_news'); ?>
		<?php echo $form->textField($model,'count_print_news'); ?>
		<?php echo $form->error($model,'count_print_news'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_news_in_page'); ?>
		<?php echo $form->textField($model,'count_news_in_page'); ?>
		<?php echo $form->error($model,'count_news_in_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'print_stat'); ?>
		<?php echo $form->textField($model,'print_stat',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'print_stat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'limit_pagination_on_page'); ?>
		<?php echo $form->textField($model,'limit_pagination_on_page'); ?>
		<?php echo $form->error($model,'limit_pagination_on_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail_about_new_mess'); ?>
		<?php echo $form->textField($model,'mail_about_new_mess',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'mail_about_new_mess'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upload_images'); ?>
		<?php echo $form->textField($model,'upload_images',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'upload_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_images_for_users'); ?>
		<?php echo $form->textField($model,'count_images_for_users'); ?>
		<?php echo $form->error($model,'count_images_for_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width_small_images'); ?>
		<?php echo $form->textField($model,'width_small_images'); ?>
		<?php echo $form->error($model,'width_small_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width_normal_images'); ?>
		<?php echo $form->textField($model,'width_normal_images'); ?>
		<?php echo $form->error($model,'width_normal_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width_cat_images'); ?>
		<?php echo $form->textField($model,'width_cat_images'); ?>
		<?php echo $form->error($model,'width_cat_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width_news_images'); ?>
		<?php echo $form->textField($model,'width_news_images'); ?>
		<?php echo $form->error($model,'width_news_images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_link_to_video'); ?>
		<?php echo $form->textField($model,'add_link_to_video',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'add_link_to_video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'captcha'); ?>
		<?php echo $form->textField($model,'captcha',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'captcha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edit_message'); ?>
		<?php echo $form->textField($model,'edit_message',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'edit_message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edit_comments'); ?>
		<?php echo $form->textField($model,'edit_comments',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'edit_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anti_link'); ?>
		<?php echo $form->textField($model,'anti_link',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'anti_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_for_notice_autor'); ?>
		<?php echo $form->textField($model,'day_for_notice_autor'); ?>
		<?php echo $form->error($model,'day_for_notice_autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_title'); ?>
		<?php echo $form->textField($model,'user_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_keywords'); ?>
		<?php echo $form->textArea($model,'user_keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_description'); ?>
		<?php echo $form->textArea($model,'user_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->