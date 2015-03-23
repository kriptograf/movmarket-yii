<?php
/**
 * Виджет новостей для главной страницы
 * Выводит три последних новости
 * @author Moskvin Vitaliy
 *
 */
class NewsWidget extends CWidget
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
		$criteria->select = 'id,title,autor,short,date';
		$criteria->limit = 3;
		
		$news = News::model()->findAll($criteria);
		
		$this->render('news',array('news'=>$news));
	}
}