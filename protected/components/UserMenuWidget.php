<?php
class UserMenuWidget extends CWidget
{
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		parent::run();
		$this->renderContent();
	}
	public function renderContent()
	{
		$menu = array(
			'0'=>array(
					'label'=>'Мои объявления', 
					'url'=>array('/profile/myboard'),
					//'active'=>($val->id == Yii::app()->request->getParam('id')),
				),
			'1'=>array(
					'label'=>'Избранные объявления', 
					'url'=>array('/profile/favorites'),
					//'active'=>($val->id == Yii::app()->request->getParam('id')),
				),
			//'1'=>array(
					//'label'=>'Контактные данные', 
					//'url'=>array('/profile/contacts'),
					//'active'=>($val->id == Yii::app()->request->getParam('id')),
				//),
		);	
		
		$this->render('user_menu', array('menu'=>$menu));
	}
}