<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('board_works')); ?>:</b>
	<?php echo CHtml::encode($data->board_works); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_new_ads')); ?>:</b>
	<?php echo CHtml::encode($data->add_new_ads); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_new_news')); ?>:</b>
	<?php echo CHtml::encode($data->add_new_news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cache_clear')); ?>:</b>
	<?php echo CHtml::encode($data->cache_clear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scache')); ?>:</b>
	<?php echo CHtml::encode($data->scache); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scache_expire')); ?>:</b>
	<?php echo CHtml::encode($data->scache_expire); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('scache_exp_expire')); ?>:</b>
	<?php echo CHtml::encode($data->scache_exp_expire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kcache')); ?>:</b>
	<?php echo CHtml::encode($data->kcache); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_new_only_user')); ?>:</b>
	<?php echo CHtml::encode($data->add_new_only_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('money_service')); ?>:</b>
	<?php echo CHtml::encode($data->money_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('top_status_days')); ?>:</b>
	<?php echo CHtml::encode($data->top_status_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('top_prefix')); ?>:</b>
	<?php echo CHtml::encode($data->top_prefix); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('top_price')); ?>:</b>
	<?php echo CHtml::encode($data->top_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('top_number')); ?>:</b>
	<?php echo CHtml::encode($data->top_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('select_status_days')); ?>:</b>
	<?php echo CHtml::encode($data->select_status_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('select_prefix')); ?>:</b>
	<?php echo CHtml::encode($data->select_prefix); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('select_price')); ?>:</b>
	<?php echo CHtml::encode($data->select_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('select_number')); ?>:</b>
	<?php echo CHtml::encode($data->select_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wm_money_service')); ?>:</b>
	<?php echo CHtml::encode($data->wm_money_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wm_mode')); ?>:</b>
	<?php echo CHtml::encode($data->wm_mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wm_purse')); ?>:</b>
	<?php echo CHtml::encode($data->wm_purse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wm_type')); ?>:</b>
	<?php echo CHtml::encode($data->wm_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmprice_vip')); ?>:</b>
	<?php echo CHtml::encode($data->wmprice_vip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmprice_select')); ?>:</b>
	<?php echo CHtml::encode($data->wmprice_select); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_theme')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_theme); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_text')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_from')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_limit')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_sleep')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_sleep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_nonactiv_contacts')); ?>:</b>
	<?php echo CHtml::encode($data->view_nonactiv_contacts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_symb_autor')); ?>:</b>
	<?php echo CHtml::encode($data->count_symb_autor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_symb_title')); ?>:</b>
	<?php echo CHtml::encode($data->count_symb_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_symb_url')); ?>:</b>
	<?php echo CHtml::encode($data->count_symb_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_symb_contacts')); ?>:</b>
	<?php echo CHtml::encode($data->count_symb_contacts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_symb_text')); ?>:</b>
	<?php echo CHtml::encode($data->count_symb_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_adv_on_index')); ?>:</b>
	<?php echo CHtml::encode($data->count_adv_on_index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags_generate')); ?>:</b>
	<?php echo CHtml::encode($data->tags_generate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kaleidoscope')); ?>:</b>
	<?php echo CHtml::encode($data->kaleidoscope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_show_img_kaleidoscope')); ?>:</b>
	<?php echo CHtml::encode($data->count_show_img_kaleidoscope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_url')); ?>:</b>
	<?php echo CHtml::encode($data->add_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_comments')); ?>:</b>
	<?php echo CHtml::encode($data->view_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clouds_tags')); ?>:</b>
	<?php echo CHtml::encode($data->clouds_tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_comments')); ?>:</b>
	<?php echo CHtml::encode($data->add_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stop_words')); ?>:</b>
	<?php echo CHtml::encode($data->stop_words); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upl_image_size')); ?>:</b>
	<?php echo CHtml::encode($data->upl_image_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail_friends')); ?>:</b>
	<?php echo CHtml::encode($data->mail_friends); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_mail')); ?>:</b>
	<?php echo CHtml::encode($data->admin_mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->print_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_vip')); ?>:</b>
	<?php echo CHtml::encode($data->print_vip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_print_vip')); ?>:</b>
	<?php echo CHtml::encode($data->count_print_vip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_news')); ?>:</b>
	<?php echo CHtml::encode($data->print_news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_print_news')); ?>:</b>
	<?php echo CHtml::encode($data->count_print_news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_news_in_page')); ?>:</b>
	<?php echo CHtml::encode($data->count_news_in_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('print_stat')); ?>:</b>
	<?php echo CHtml::encode($data->print_stat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('limit_pagination_on_page')); ?>:</b>
	<?php echo CHtml::encode($data->limit_pagination_on_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail_about_new_mess')); ?>:</b>
	<?php echo CHtml::encode($data->mail_about_new_mess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upload_images')); ?>:</b>
	<?php echo CHtml::encode($data->upload_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_images_for_users')); ?>:</b>
	<?php echo CHtml::encode($data->count_images_for_users); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width_small_images')); ?>:</b>
	<?php echo CHtml::encode($data->width_small_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width_normal_images')); ?>:</b>
	<?php echo CHtml::encode($data->width_normal_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width_cat_images')); ?>:</b>
	<?php echo CHtml::encode($data->width_cat_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width_news_images')); ?>:</b>
	<?php echo CHtml::encode($data->width_news_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_link_to_video')); ?>:</b>
	<?php echo CHtml::encode($data->add_link_to_video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('captcha')); ?>:</b>
	<?php echo CHtml::encode($data->captcha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_message')); ?>:</b>
	<?php echo CHtml::encode($data->edit_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_comments')); ?>:</b>
	<?php echo CHtml::encode($data->edit_comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anti_link')); ?>:</b>
	<?php echo CHtml::encode($data->anti_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_for_notice_autor')); ?>:</b>
	<?php echo CHtml::encode($data->day_for_notice_autor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_title')); ?>:</b>
	<?php echo CHtml::encode($data->user_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->user_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_description')); ?>:</b>
	<?php echo CHtml::encode($data->user_description); ?>
	<br />

	*/ ?>

</div>