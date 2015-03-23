<?php
class LastBoardWidget extends CWidget
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
		$criteria = new CDbCriteria();
		/**
		 * Если есть фильтр по регионам, добавляем кондишн
		 */
		if($region = Yii::app()->request->cookies['region']->value)
		{
			$criteria->condition = 'id_region='.$region;
		}
		/**
		 * Если есть фильтр по городам, добавляем кондишн
		 */
		if($city = Yii::app()->request->cookies['city']->value)
		{
			$criteria->addCondition('id_city='.$city);
		}
		/**
		 * Сортируем по дате добавления
		 */
		$criteria->order = 'date_add DESC';
		/**
		 * Выбираем последние 10 объявлений
		 */
		$criteria->limit = 10;
		
		if(!Yii::app()->user->isGuest)
		{
			$criteria->with = array('favorite'=>array(
						    	'condition'=>'favorite.user_id='.Yii::app()->user->id,
			 ));
		}
		
						   
		
		$boards = Board::model()->findAll($criteria);
                
                if(!$boards)
                {
                    echo 'Вы будете первым посетителем, разместившим свое объявление.';
                    return FALSE;
                }
		
		$this->render('lastboard', array('boards'=>$boards));
	}
}