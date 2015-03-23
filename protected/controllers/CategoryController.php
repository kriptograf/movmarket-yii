<?php

class CategoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','filter'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Показ категории и вип объявлений из этой категории
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//if(Yii::app()->request->isAjaxRequest)
		//{
			//echo Yii::app()->request->getQueryString();
		//}
		/**
		 * Подключаем jquery куки плагин
		 */
		Yii::app()->clientScript->registerScriptFile('/js/jquery.cookie.js', CClientScript::POS_HEAD);
		
		/**
		 * Если есть кука с фильтром типа объявления, выставляем критерии выборки
		 */
		if($cookie = Yii::app()->request->cookies['type']->value)
		{
			$criteria = ' AND type="'.$cookie.'"';
			$active = $cookie;
		}
		else 
		{
			/**
			 * Если нет, выставляем критерии по умолчанию
			 * @var unknown_type
			 */
			$criteria = '';
			$active = 's';
		}
		
		/**
		 * Фильтрация по локациям
		 */
		if($region = Yii::app()->request->cookies['region']->value)
		{
			$criteria .= ' AND id_region='.$region;
		}
		if($city = Yii::app()->request->cookies['city']->value)
		{
			$criteria .= ' AND id_city='.$city;
		}
		
		/**
		 * Получить дочерние категории
		 * @var unknown_type
		 */
		$sub_cat = Category::model()->findAll('parent_id='.$id);
		
		
		/**
		 * Если это корневая категория и есть подкатегории
		 */
		if($sub_cat)
		{
			/**
			 * Выбрать идентификаторы подкатегорий в массив
			 * @var unknown_type
			 */
			$subarr = array();
			foreach ($sub_cat as $item)
			{
				$subarr[]=$item->id;
			}
			
			/**
			 * Сформировать строку идентификаторов разделенных запятой
			 * @var unknown_type
			 */
			$comma_separated = implode(",", $subarr);
			
			$sort = new CSort();
	        $sort->attributes = array(
	            'price'=>array(
	                'asc'=>'price',
	                'desc'=>'price desc',
	            ),
	            'defaultOrder'=>array(
	                 'date_add'=>CSort::SORT_DESC,
	            )
	        );


			/**
			 * Выбрать все объявления из подкатегорий у которых атрибут vip равен 0
             * Если пользователь авторизован включаем в выборку избранные
			 * @var unknown_type
			 */
            if(!Yii::app()->user->isGuest)
            {
                $ads = new CActiveDataProvider('Board',array(
                        'criteria'=>array(
                            'condition'=>'id_category IN('.$comma_separated.') AND vip=0'.$criteria,
                            'with'=>array('favorite'=>array(
                                'condition'=>'favorite.user_id='.Yii::app()->user->id,
                            )),
                        ),
                        'sort'=>$sort,

                    )
                );
            }
            else
            {
                $ads = new CActiveDataProvider('Board',array(
                        'criteria'=>array(
                            'condition'=>'id_category IN('.$comma_separated.') AND vip=0'.$criteria,
                        ),
                        'sort'=>$sort,

                    )
                );
            }

			
		}
		else 
		{
			$sort = new CSort();
	        $sort->attributes = array(
	            'price'=>array(
	                'asc'=>'price',
	                'desc'=>'price desc',
	            ),
	            'defaultOrder'=>array(
	                 'date_add'=>CSort::SORT_DESC,
	            )
	        );

            /**
             * Если пользователь авторизован, то включаем в выборку избранные объявления
             */
            if(!Yii::app()->user->isGuest)
            {
                $ads = new CActiveDataProvider('Board',array(
                        'criteria'=>array(
                            'condition'=>'id_category = '.$id.' AND vip=0'.$criteria,
                            'with'=>array('favorite'=>array(
                                'condition'=>'favorite.user_id='.Yii::app()->user->id,
                            )),
                        ),
                        'sort'=>$sort,
                    )
                );
                $vip = new CActiveDataProvider('Board',array(
                        'criteria'=>array(
                            'condition'=>'id_category = '.$id.' AND vip=1',
                            'order'=>'viptime DESC',
                            'with'=>array('favorite'=>array(
                                'condition'=>'favorite.user_id='.Yii::app()->user->id,
                            )),
                        ),
                    )
                );
            }
            else
            {
                $ads = new CActiveDataProvider('Board',array(
                        'criteria'=>array(
                            'condition'=>'id_category = '.$id.' AND vip=0'.$criteria,
                        ),
                        'sort'=>$sort,
                    )
                );
                $vip = new CActiveDataProvider('Board',array(
                        'criteria'=>array(
                            'condition'=>'id_category = '.$id.' AND vip=1',
                            'order'=>'viptime DESC',
                        ),
                    )
                );
            }

				
			if(Yii::app()->request->getParam('parent'))
			{
				$sub_cat = Category::model()->findAll('parent_id='.Yii::app()->request->getParam('parent'));
			}
			if(Yii::app()->request->isAjaxRequest && Yii::app()->request->getParam('ajax')=='list_cat')
			{
				$sub_cat = Category::model()->findAll('parent_id='.Yii::app()->request->getParam('parent'));
			}
			
		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'boards'=>$ads,
			'vip'=>$vip,
			'sub_cat'=>$sub_cat,
			'active'=>$active,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
