<?php
/**
 * Виджет коневых категорий. Виден на всех страницах сайта
 * @author Moskvin Vitaliy
 */
class CategoryWidget extends CWidget
{
	public $active_menu;
	
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
    	 * Инициализация результирующего массива
    	 * @var unknown_type
    	 */
    	$r = array();
    	/**
    	 * Выбрать корневые категории
    	 * @var object
    	 */
        $categories = Category::model()->findAll('parent_id=0');
        
        /**
         * Сформировать массив для виджета CMenu
         */
        foreach($categories as $val)
        {
        	//заполнить массив элементами меню
			$r[] =   array(
							'label'=>$val->name_cat, 
							'url'=>array('/category/'.$val->id),
							'active'=>Yii::app()->controller->id != 'board' && ($val->id == Yii::app()->request->getParam('id') || $val->id == Yii::app()->request->getParam('parent')),
					);
        }
        
        $this->render('cat_menu',array('categories'=>$r));
    }
}
