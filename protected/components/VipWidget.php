<?php
/**
 * Виджет вип объявлений отсортированных по дате размещения
 * @author Moskvin Vitaliy
 *
 */
class VipWidget extends CWidget
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
		$vips = Board::model()->findAll('vip=1');
		$this->render('vip', array('vips'=>$vips));
	}
}