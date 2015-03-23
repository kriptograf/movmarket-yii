<?php
/**
 * Виджет вип объявлений для отдельной категории
 * @author Moskvin Vitaliy
 *
 */
class VipBoardWidget extends CWidget
{
	public $vipid;
	
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
		/**
		 * Получить все объявления, где id категории равент текущей категории 
		 * и является вип.Отсортировать их по дате добавления
		 *  @var object
		 */
		$vip = new CActiveDataProvider('Board',array(
					    'criteria'=>array(
					        'condition'=>'id_category = '.$this->vipid.' AND vip=1',
					        'order'=>'viptime DESC',
					    ),
				    )
				);
		$this->render('vip_board',array('vip'=>$vip));
	}
}