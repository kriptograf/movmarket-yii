<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property string $board_works
 * @property string $add_new_ads
 * @property string $add_new_news
 * @property integer $id
 * @property string $cache_clear
 * @property integer $scache
 * @property integer $scache_expire
 * @property integer $scache_exp_expire
 * @property integer $kcache
 * @property string $add_new_only_user
 * @property string $money_service
 * @property integer $top_status_days
 * @property string $top_prefix
 * @property string $top_price
 * @property string $top_number
 * @property integer $select_status_days
 * @property string $select_prefix
 * @property string $select_price
 * @property string $select_number
 * @property string $wm_money_service
 * @property string $wm_mode
 * @property string $wm_purse
 * @property string $wm_type
 * @property integer $wmprice_vip
 * @property integer $wmprice_select
 * @property string $subscribe_theme
 * @property string $subscribe_text
 * @property string $subscribe_from
 * @property integer $subscribe_limit
 * @property integer $subscribe_sleep
 * @property string $view_nonactiv_contacts
 * @property integer $count_symb_autor
 * @property integer $count_symb_title
 * @property integer $count_symb_url
 * @property integer $count_symb_contacts
 * @property integer $count_symb_text
 * @property integer $count_adv_on_index
 * @property string $tags_generate
 * @property string $kaleidoscope
 * @property integer $count_show_img_kaleidoscope
 * @property string $add_url
 * @property string $view_comments
 * @property string $clouds_tags
 * @property string $add_comments
 * @property string $stop_words
 * @property integer $upl_image_size
 * @property string $mail_friends
 * @property string $admin_mail
 * @property string $print_keywords
 * @property string $print_vip
 * @property integer $count_print_vip
 * @property string $print_news
 * @property integer $count_print_news
 * @property integer $count_news_in_page
 * @property string $print_stat
 * @property integer $limit_pagination_on_page
 * @property string $mail_about_new_mess
 * @property string $upload_images
 * @property integer $count_images_for_users
 * @property integer $width_small_images
 * @property integer $width_normal_images
 * @property integer $width_cat_images
 * @property integer $width_news_images
 * @property string $add_link_to_video
 * @property string $captcha
 * @property string $edit_message
 * @property string $edit_comments
 * @property string $anti_link
 * @property integer $day_for_notice_autor
 * @property string $user_title
 * @property string $user_keywords
 * @property string $user_description
 */
class Config extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('top_prefix, top_price, top_number, select_prefix, select_price, select_number, wm_purse, subscribe_theme, subscribe_text, subscribe_from, stop_words, admin_mail, user_title, user_keywords, user_description', 'required'),
			array('id, scache, scache_expire, scache_exp_expire, kcache, top_status_days, select_status_days, wmprice_vip, wmprice_select, subscribe_limit, subscribe_sleep, count_symb_autor, count_symb_title, count_symb_url, count_symb_contacts, count_symb_text, count_adv_on_index, count_show_img_kaleidoscope, upl_image_size, count_print_vip, count_print_news, count_news_in_page, limit_pagination_on_page, count_images_for_users, width_small_images, width_normal_images, width_cat_images, width_news_images, day_for_notice_autor', 'numerical', 'integerOnly'=>true),
			array('board_works', 'length', 'max'=>10),
			array('add_new_ads, add_new_news, add_new_only_user, money_service, wm_money_service, wm_mode, wm_type, view_nonactiv_contacts, tags_generate, kaleidoscope, add_url, view_comments, clouds_tags, add_comments, mail_friends, print_keywords, print_vip, print_news, print_stat, mail_about_new_mess, upload_images, add_link_to_video, captcha, edit_message, edit_comments, anti_link', 'length', 'max'=>3),
			array('cache_clear', 'length', 'max'=>5),
			array('top_prefix, top_price, top_number, select_prefix, select_price, select_number', 'length', 'max'=>32),
			array('wm_purse', 'length', 'max'=>13),
			array('subscribe_theme, user_title', 'length', 'max'=>255),
			array('subscribe_from', 'length', 'max'=>128),
			array('admin_mail', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('board_works, add_new_ads, add_new_news, id, cache_clear, scache, scache_expire, scache_exp_expire, kcache, add_new_only_user, money_service, top_status_days, top_prefix, top_price, top_number, select_status_days, select_prefix, select_price, select_number, wm_money_service, wm_mode, wm_purse, wm_type, wmprice_vip, wmprice_select, subscribe_theme, subscribe_text, subscribe_from, subscribe_limit, subscribe_sleep, view_nonactiv_contacts, count_symb_autor, count_symb_title, count_symb_url, count_symb_contacts, count_symb_text, count_adv_on_index, tags_generate, kaleidoscope, count_show_img_kaleidoscope, add_url, view_comments, clouds_tags, add_comments, stop_words, upl_image_size, mail_friends, admin_mail, print_keywords, print_vip, count_print_vip, print_news, count_print_news, count_news_in_page, print_stat, limit_pagination_on_page, mail_about_new_mess, upload_images, count_images_for_users, width_small_images, width_normal_images, width_cat_images, width_news_images, add_link_to_video, captcha, edit_message, edit_comments, anti_link, day_for_notice_autor, user_title, user_keywords, user_description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'board_works' => 'Board Works',
			'add_new_ads' => 'Add New Ads',
			'add_new_news' => 'Add New News',
			'id' => 'ID',
			'cache_clear' => 'Cache Clear',
			'scache' => 'Scache',
			'scache_expire' => 'Scache Expire',
			'scache_exp_expire' => 'Scache Exp Expire',
			'kcache' => 'Kcache',
			'add_new_only_user' => 'Add New Only User',
			'money_service' => 'Money Service',
			'top_status_days' => 'Top Status Days',
			'top_prefix' => 'Top Prefix',
			'top_price' => 'Top Price',
			'top_number' => 'Top Number',
			'select_status_days' => 'Select Status Days',
			'select_prefix' => 'Select Prefix',
			'select_price' => 'Select Price',
			'select_number' => 'Select Number',
			'wm_money_service' => 'Wm Money Service',
			'wm_mode' => 'Wm Mode',
			'wm_purse' => 'Wm Purse',
			'wm_type' => 'Wm Type',
			'wmprice_vip' => 'Wmprice Vip',
			'wmprice_select' => 'Wmprice Select',
			'subscribe_theme' => 'Subscribe Theme',
			'subscribe_text' => 'Subscribe Text',
			'subscribe_from' => 'Subscribe From',
			'subscribe_limit' => 'Subscribe Limit',
			'subscribe_sleep' => 'Subscribe Sleep',
			'view_nonactiv_contacts' => 'View Nonactiv Contacts',
			'count_symb_autor' => 'Count Symb Autor',
			'count_symb_title' => 'Count Symb Title',
			'count_symb_url' => 'Count Symb Url',
			'count_symb_contacts' => 'Count Symb Contacts',
			'count_symb_text' => 'Count Symb Text',
			'count_adv_on_index' => 'Count Adv On Index',
			'tags_generate' => 'Tags Generate',
			'kaleidoscope' => 'Kaleidoscope',
			'count_show_img_kaleidoscope' => 'Count Show Img Kaleidoscope',
			'add_url' => 'Add Url',
			'view_comments' => 'View Comments',
			'clouds_tags' => 'Clouds Tags',
			'add_comments' => 'Add Comments',
			'stop_words' => 'Stop Words',
			'upl_image_size' => 'Upl Image Size',
			'mail_friends' => 'Mail Friends',
			'admin_mail' => 'Admin Mail',
			'print_keywords' => 'Print Keywords',
			'print_vip' => 'Print Vip',
			'count_print_vip' => 'Count Print Vip',
			'print_news' => 'Print News',
			'count_print_news' => 'Count Print News',
			'count_news_in_page' => 'Count News In Page',
			'print_stat' => 'Print Stat',
			'limit_pagination_on_page' => 'Limit Pagination On Page',
			'mail_about_new_mess' => 'Mail About New Mess',
			'upload_images' => 'Upload Images',
			'count_images_for_users' => 'Count Images For Users',
			'width_small_images' => 'Width Small Images',
			'width_normal_images' => 'Width Normal Images',
			'width_cat_images' => 'Width Cat Images',
			'width_news_images' => 'Width News Images',
			'add_link_to_video' => 'Add Link To Video',
			'captcha' => 'Captcha',
			'edit_message' => 'Edit Message',
			'edit_comments' => 'Edit Comments',
			'anti_link' => 'Anti Link',
			'day_for_notice_autor' => 'Day For Notice Autor',
			'user_title' => 'User Title',
			'user_keywords' => 'User Keywords',
			'user_description' => 'User Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('board_works',$this->board_works,true);
		$criteria->compare('add_new_ads',$this->add_new_ads,true);
		$criteria->compare('add_new_news',$this->add_new_news,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('cache_clear',$this->cache_clear,true);
		$criteria->compare('scache',$this->scache);
		$criteria->compare('scache_expire',$this->scache_expire);
		$criteria->compare('scache_exp_expire',$this->scache_exp_expire);
		$criteria->compare('kcache',$this->kcache);
		$criteria->compare('add_new_only_user',$this->add_new_only_user,true);
		$criteria->compare('money_service',$this->money_service,true);
		$criteria->compare('top_status_days',$this->top_status_days);
		$criteria->compare('top_prefix',$this->top_prefix,true);
		$criteria->compare('top_price',$this->top_price,true);
		$criteria->compare('top_number',$this->top_number,true);
		$criteria->compare('select_status_days',$this->select_status_days);
		$criteria->compare('select_prefix',$this->select_prefix,true);
		$criteria->compare('select_price',$this->select_price,true);
		$criteria->compare('select_number',$this->select_number,true);
		$criteria->compare('wm_money_service',$this->wm_money_service,true);
		$criteria->compare('wm_mode',$this->wm_mode,true);
		$criteria->compare('wm_purse',$this->wm_purse,true);
		$criteria->compare('wm_type',$this->wm_type,true);
		$criteria->compare('wmprice_vip',$this->wmprice_vip);
		$criteria->compare('wmprice_select',$this->wmprice_select);
		$criteria->compare('subscribe_theme',$this->subscribe_theme,true);
		$criteria->compare('subscribe_text',$this->subscribe_text,true);
		$criteria->compare('subscribe_from',$this->subscribe_from,true);
		$criteria->compare('subscribe_limit',$this->subscribe_limit);
		$criteria->compare('subscribe_sleep',$this->subscribe_sleep);
		$criteria->compare('view_nonactiv_contacts',$this->view_nonactiv_contacts,true);
		$criteria->compare('count_symb_autor',$this->count_symb_autor);
		$criteria->compare('count_symb_title',$this->count_symb_title);
		$criteria->compare('count_symb_url',$this->count_symb_url);
		$criteria->compare('count_symb_contacts',$this->count_symb_contacts);
		$criteria->compare('count_symb_text',$this->count_symb_text);
		$criteria->compare('count_adv_on_index',$this->count_adv_on_index);
		$criteria->compare('tags_generate',$this->tags_generate,true);
		$criteria->compare('kaleidoscope',$this->kaleidoscope,true);
		$criteria->compare('count_show_img_kaleidoscope',$this->count_show_img_kaleidoscope);
		$criteria->compare('add_url',$this->add_url,true);
		$criteria->compare('view_comments',$this->view_comments,true);
		$criteria->compare('clouds_tags',$this->clouds_tags,true);
		$criteria->compare('add_comments',$this->add_comments,true);
		$criteria->compare('stop_words',$this->stop_words,true);
		$criteria->compare('upl_image_size',$this->upl_image_size);
		$criteria->compare('mail_friends',$this->mail_friends,true);
		$criteria->compare('admin_mail',$this->admin_mail,true);
		$criteria->compare('print_keywords',$this->print_keywords,true);
		$criteria->compare('print_vip',$this->print_vip,true);
		$criteria->compare('count_print_vip',$this->count_print_vip);
		$criteria->compare('print_news',$this->print_news,true);
		$criteria->compare('count_print_news',$this->count_print_news);
		$criteria->compare('count_news_in_page',$this->count_news_in_page);
		$criteria->compare('print_stat',$this->print_stat,true);
		$criteria->compare('limit_pagination_on_page',$this->limit_pagination_on_page);
		$criteria->compare('mail_about_new_mess',$this->mail_about_new_mess,true);
		$criteria->compare('upload_images',$this->upload_images,true);
		$criteria->compare('count_images_for_users',$this->count_images_for_users);
		$criteria->compare('width_small_images',$this->width_small_images);
		$criteria->compare('width_normal_images',$this->width_normal_images);
		$criteria->compare('width_cat_images',$this->width_cat_images);
		$criteria->compare('width_news_images',$this->width_news_images);
		$criteria->compare('add_link_to_video',$this->add_link_to_video,true);
		$criteria->compare('captcha',$this->captcha,true);
		$criteria->compare('edit_message',$this->edit_message,true);
		$criteria->compare('edit_comments',$this->edit_comments,true);
		$criteria->compare('anti_link',$this->anti_link,true);
		$criteria->compare('day_for_notice_autor',$this->day_for_notice_autor);
		$criteria->compare('user_title',$this->user_title,true);
		$criteria->compare('user_keywords',$this->user_keywords,true);
		$criteria->compare('user_description',$this->user_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}