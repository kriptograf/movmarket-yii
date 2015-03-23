<?php
class LocationWidget extends CWidget
{
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$this->renderContent();
		parent::run();
	}
	public function renderContent()
	{
		$region = '';
		$city = '';
		$cities = array();
		
		$criteria = new CDbCriteria();
		$criteria->compare('country_id', '9908');
		
		/**
		 * Дополнительные параметры для строки фильтра. Если установлен фильтр, то показаны параметры фильтрации
		 * @var unknown_type
		 */
		if($cookie_region = Yii::app()->request->cookies['region']->value)
		{
			$region = Region::model()->findByPk($cookie_region)->name;
			$cities = City::model()->findAll('region_id='.$cookie_region);
		}
		if($cookie_city = Yii::app()->request->cookies['city']->value)
		{
			$city = City::model()->findByPk($cookie_city)->name;
		}
		
		$model = Region::model()->findAll($criteria);
		$this->render('location', array(
			'model'=>$model,
			'region'=>$region,
			'city'=>$city,
			'cities'=>$cities,
		));
	}
}