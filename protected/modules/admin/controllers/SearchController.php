<?php
class SearchController extends AdminController
{
	/**
     * @var string index dir as alias path from <b>application.</b>  , default to <b>runtime.search</b>
     */
    private $_indexFiles = 'runtime.search';
    
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='application.modules.admin.views.layouts.column2';
	
	/**
	 * Действие по умолчанию
	 */
	public $defaultAction = 'create';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform all actions
				'actions'=>array('create'),
				'users'=>AdminModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	
    /**
     * (non-PHPdoc)
     * @see CController::init()
     */
    public function init()
    {
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        parent::init(); 
    }

    /**
     * Search index creation
     */
    public function actionCreate()
    {
        setlocale(LC_CTYPE, 'ru_RU.UTF-8');
        
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8());       

        $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);

        $allboards = Board::model()->findAll();
        
        foreach($allboards as $board)
        {
            $doc = new Zend_Search_Lucene_Document();
            /**
             * Добавляем в индекс заголовок
             */
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($board->title), 'UTF-8'));
            /**
             * Добавляем в индекс цену
             */
            $doc->addField(Zend_Search_Lucene_Field::Text('price', CHtml::encode($board->price), 'UTF-8'));
            /**
             * Добавляем в индекс валюту
             */
            $doc->addField(Zend_Search_Lucene_Field::Text('currency', CHtml::encode($board->currency), 'UTF-8'));
            /**
             * Добавляем в индекс дату
             */
            $doc->addField(Zend_Search_Lucene_Field::Text('date', CHtml::encode($board->date_add), 'UTF-8'));
            
            /**
             * Добавляем в индекс картинки
             */
            $doc->addField(Zend_Search_Lucene_Field::Text('image', CHtml::encode(($board->photos[0]->thumb) ? $board->photos[0]->thumb : 'nophoto.jpg'), 'UTF-8'));
			/**
			 * Добавляем в индекс ссылку
			 */
            $doc->addField(Zend_Search_Lucene_Field::Text('link',Yii::app()->createUrl('/board/'.$board->id) , 'UTF-8'));   

  			//$content = $this->clean_content($board->text);
  			/**
  			 * Добавляем в индекс текст
  			 */
            $doc->addField(Zend_Search_Lucene_Field::Text('content',CHtml::encode($board->text), 'UTF-8'));

            $index->addDocument($doc);
        }
        
        $index->optimize();
        $index->commit();
        
        echo 'Lucene index создан успешно';
    }
	
	// Function for returning a preview of the content:
	// The preview is the first XXX characters.
	private function preview_content($data, $limit = 400) 
	{
	   return substr($data, 0, $limit) . '...';
	} 
	// End of preview_content() function.
	// Function for stripping junk out of content:
	private function clean_content($data) 
	{
	   return strip_tags($data);
	}
}