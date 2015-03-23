<?php
class PromotionWidget extends CWidget
{
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$this->rendrContent();
		parent::run();
	}
	public function rendrContent()
	{
		$banner = Banners::model()->findByAttributes(array('position'=>'right'));
		$this->render('promotion',array('banner'=>$banner));
	}
}