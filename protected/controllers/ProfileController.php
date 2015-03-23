<?php

class ProfileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $defaultAction = 'view';
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view', 'update','myboard', 'edit', 'myboardDetail', 'favorites', 'deleteFavorite'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(Yii::app()->user->returnUrl);
		}
		else 
		{
			$id = Yii::app()->user->id;
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}
	}
	
	public function actionMyboard()
	{
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(Yii::app()->user->returnUrl);
		}
		else 
		{
			$id = Yii::app()->user->id;
		
			$criteria = new CDbCriteria();
			$criteria->compare('user_id', $id);
			
			$boards = Board::model()->findAll($criteria);
			
			$model = Profile::model()->findByAttributes(array('user_id'=>$id));
			
			$this->render('myboard',array(
				'myboards'=>$boards,
				'model'=>$model,
			));
		}
	}

	public function actionMyboardDetail($id)
	{
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.lightbox.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.lightbox-0.5.css', 'screen');
		
		$this->render('detail',array(
			'model'=>Board::model()->findByPk($id),
		));
	}
	
	public function actionFavorites()
	{
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(Yii::app()->user->returnUrl);
		}
		
		$criteria = new CDbCriteria();
		$criteria->addCondition('t.user_id='.Yii::app()->user->id);
		$criteria->with = 'board';
		$favorites = Favorites::model()->findAll($criteria);
		
		$model = Profile::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		
		$this->render('favorites',array(
				'favorites'=>$favorites,
				'model'=>$model,
			));
	}
	
	public function actionDeleteFavorite()
	{
		$id = Yii::app()->request->getParam('id');
		
		$criteria = new CDbCriteria();
		
		$criteria->compare('id', $id);
		$criteria->compare('user_id', Yii::app()->user->id);
		
		$model = Favorites::model()->find($criteria);
		
		if(!$model)
		{
			Yii::app()->user->setFlash('message', 'Вы не можете удалить из избранного это объявление.');
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
		if($model->delete())
		{
			Yii::app()->user->setFlash('message', 'Объявление удалено из избранного.');
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 
	public function actionCreate()
	{
		$model=new Profile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/
	
/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionEdit()
	{
		Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
		Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/combobox.js', CClientScript::POS_HEAD);
		
		
		$id = Yii::app()->user->id;
		
		$model=$this->loadModel($id);
		
		$cities = City::model()->findAll('country_id=9908');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
			if($model->save())
            {
                /**
                 * Оптравляем уведомление админу
                 */
                $email = Yii::app()->email;
                $email->to = 'foreach@mail.ru';
                $email->subject = 'movmarket.biz - Пользователь изменил свой профиль';
                $email->view = 'edit_profile';
                $email->viewVars = array('username'=>Yii::app()->user->login);
                $email->send();

                $this->redirect(array('/profile'));
            }

		}

		$this->render('update',array(
			'model'=>$model,
			'cities'=>$cities,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = Profile::model()->findByAttributes(array('user_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'Страница не найдена. Возможно такой страницы не существует');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
