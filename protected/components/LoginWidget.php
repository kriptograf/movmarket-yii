<?php
class LoginWidget extends CWidget
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
		$this->render('form_login');
	}
}