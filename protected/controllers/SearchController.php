<?php

class SearchController extends Controller {

    public $defaultAction = 'result';

    /**
     * @var string index dir as alias path from <b>application.</b>  , default to <b>runtime.search</b>
     */
    private $_indexFiles = 'runtime.search';

    /**
     * (non-PHPdoc)
     * @see CController::init()

      public function init()
      {
      Yii::import('application.vendors.*');
      require_once('Zend/Search/Lucene.php');
      parent::init();
      } */
    public function actionResult() 
    {
        //setlocale(LC_CTYPE, 'ru_RU.UTF-8');

        //Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8());

        $this->layout='column2';
        //if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) 
        if (($term = Yii::app()->request->getPost('q', null)) !== null) 
        {
            /**
             * Фильтруем строку введенную пользователем
             * @var unknown_type
             */
            $term = CHtml::encode($term);
            /**
             * Сохрняем строку в сессию
             */
            Yii::app()->setGlobalState('term', $term);

            //$index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));

            //$results = $index->find($term);
            if($term!="")
            {
                $criteria = new CDbCriteria();
                $criteria->addSearchCondition('title', $term);
                $criteria->addSearchCondition('text', $term,true,'OR');
                $results = Board::model()->findAll($criteria);
            }
            else
            {
                $results = NULL;
            }
            //Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');

            //$query = Zend_Search_Lucene_Search_QueryParser::parse($term, 'UTF-8');


            $this->render('result', compact('results', 'term', 'query'));
        } 
        else 
        {
            $term = Yii::app()->getGlobalState('term');

            //$index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));

            //$results = $index->find($term);
            if($term!="")
            {
                $criteria = new CDbCriteria();
                $criteria->addSearchCondition('title', $term);
                $criteria->addSearchCondition('text', $term, TRUE, 'OR');
                $results = Board::model()->findAll($criteria);
            }
            else
            {
                $results = NULL;
            }

            //Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');

            //$query = Zend_Search_Lucene_Search_QueryParser::parse($term, 'UTF-8');


            $this->render('result', compact('results', 'term', 'query'));
        }
    }

}
