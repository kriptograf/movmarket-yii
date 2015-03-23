<?php
class SearchBlockWidget extends CWidget
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
		$this->render('search_form');
	}
}