<?php

class BoardController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
			array(
            //'ESetReturnUrlFilter',
	         // Используем фильтр для возврата сюда в метод create после регистрации или авторизации:
	        'ESetReturnUrlFilter + create',
	        ),
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
				'actions'=>array('view', 'create', 'ajaxGmap'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','edit', 'delete', 'extend'),
				'users'=>array('@'),
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
	public function actionView($id)
	{
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.lightbox.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.lightbox-0.5.css', 'screen');

        $criteria = new CDbCriteria();
        $criteria->compare('board_id',$id);
        $location = Location::model()->find($criteria);
        /**
		 * увеличиваем клики по объявлению
		 */
		if($this->Click($id))
		{
			
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'location'=>$location,
		));
	}
	
	
	
	/**
	 * Метод наращивания кликов по объявлению
	 * @param integer $id the ID of the model to be updated
	 */
	public function Click($id)
	{
		$model=$this->loadModel($id);


		$model->click = $model->click+1;
		if($model->save())
		{
			return true;
		}
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Board;
		
		//$cat = new Category();
		
		//корневые категории для выпадающего списка
		$category = Category::model()->findAll('parent_id=0');
		
		//Страны для селекта -- Пока только Украина для скрытого поля
		$country = '9908';//Country::model()->findAll();
		
		//Регионы для селекта
		$regions = Region::model()->findAll('country_id=9908');
		
		/**
		 * Гуглокарта
		 */
		$location = new Location();

		// Uncomment the following line if AJAX validation is needed
	    $this->performAjaxValidation($model);

		if(isset($_POST['Board']))
		{

			$model->attributes=$_POST['Board'];
			//Если пользователь авторизован, сохраняем его id
			if (!Yii::app()->user->isGuest)
			{
				$model->user_id = Yii::app()->user->id;
			}
			
			$model->date_add = time();
			if($model->save())
			{
                /**
                 * Сохраняем запись в базу о отметке на карте
                 */
                $location->board_id = $model->id;
                $location->latitude = $_POST['latitude'] ;
                $location->longitude = $_POST['longitude'] ;
                $location->map_zoom_level = 14;
                if($location->save())
                {
                    /**
                     * Если объявление сохранено
                     * Работем с изображениями
                     * @var unknown_type
                     */
                    $images = CUploadedFile::getInstancesByName('images');
                    //echo CVarDumper::dump($images,10, true);exit;
                    /**
                     * Если есть хоть одно изображение
                     * Перебираем их в цикле
                     */
                    if (isset($images) && count($images) > 0)
                    {
                        //Массив разрешенных типов
                        $allowed_types = array('jpeg','jpg','gif','png');
                        //echo CVarDumper::dump($images,10, true);exit;
                        foreach ($images as $image => $pic)
                        {
                            //Получаем расширение файла
                            $ext = pathinfo($pic->name, PATHINFO_EXTENSION);
                            //Если тип файла не разрешен, пропускаем итерацию
                            if(!in_array($ext, $allowed_types))
                            {
                                continue;
                            }
                            //Новое имя файла
                            $new_filename = md5(microtime());
                            $big = $new_filename.'.'.$ext;
                            /**
                             * Если файл сохранен в директорию
                             */
                            if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/uploads/photos/photo/'.$big))
                            {
                                //Новое имя превьюшки
                                $new_thumbname = md5(microtime());
                                $thumb = $new_thumbname.'.'.$ext;
                                /**
                                 * Получаем из него превьюшку
                                 */
                                //Используем функции расширения CImageHandler;
                                $ih = new CImageHandler(); //Инициализация
                                //Загрузка оригинала картинки
                                Yii::app()->ih->load(Yii::getPathOfAlias('webroot').'/uploads/photos/photo/'.$big)
                                    ->thumb('50', false) //Создание превьюшки шириной 200px
                                    ->save(Yii::getPathOfAlias('webroot').'/uploads/photos/thumb/'.$thumb); //Сохранение превьюшки в папку thumb;

                                /**
                                 * Сохраняем изображения
                                 */
                                $img_add = new Photo();
                                $img_add->photo = $big;
                                $img_add->thumb = $thumb;
                                $img_add->id_board = $model->id;

                                //echo CVarDumper::dump($img_add,10, true);

                                if(!$img_add->save())
                                {
                                    echo CVarDumper::dump($img_add->errors, 10, true); exit;
                                }

                            }
                        }
                    }
                    /**
                     * Отправляем уведомление админу о новом объявлении
                     */
                    if($this->SimpleMail($model->id,$model->title,$model->text,$model->date_add))
                    {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                    else
                    {
                        throw new CHttpException('400','Произошла ошибка при отправке уведомления');
                    }
                }

            	
				
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
			'category'=>$category,
			'country'=>$country,
			'regions'=>$regions,
			'categorySelectData' => Category::model()->getAllCategoriesForSelect(),
		));
	}
	

	private function SimpleMail($id,$title,$text,$date)
	{
		/* получатели */
		$to= Yii::app()->params['adminEmail'];
		
		/* тема/subject */
		$subject = "Размещено новое объявление";
		
		/* сообщение */
		$message = '
		<html>
		<head>
		 <meta charset="utf-8">
		 <title>Размещено новое объявление</title>
		</head>
		<body>
		<h2>Размещено новое объявление</h2>
		<p><b>'.$title.'</b></p>
		<p>'.$text.'</p>
		<p>'.date('d-m-Y H:i',$date).'</p>
		<a href="http://'.$_SERVER["HTTP_HOST"].'/board/'.$id.'.html">Открыть</a>
		</body>
		</html>
		';
		
		/* Для отправки HTML-почты вы можете установить шапку Content-type. */
		$headers= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		
		/* дополнительные шапки 
		$headers .= "From: Birthday Reminder <birthday@example.com>\r\n";
		$headers .= "Cc: birthdayarchive@example.com\r\n";
		$headers .= "Bcc: birthdaycheck@example.com\r\n";*/
		
		/* и теперь отправим из */
		if(mail($to, $subject, $message, $headers))
		{
			return true;
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionEdit($id)
	{
		$model=$this->loadModel($id);

		//корневые категории для выпадающего списка
		$category = Category::model()->findAll('parent_id=0');
		
		//Страны для селекта -- Пока только Украина для скрытого поля
		$country = '9908';//Country::model()->findAll();
		
		//Регионы для селекта
		$regions = Region::model()->findAll('country_id=9908');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Board']))
		{
			$model->attributes=$_POST['Board'];
			if($model->save())
			{
				$this->redirect(array('/profile/myboard'));
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
			'category'=>$category,
			'country'=>$country,
			'regions'=>$regions,
			'categorySelectData' => Category::model()->getAllCategoriesForSelect(),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$criteria = new CDbCriteria();
		$criteria->compare('id', $id);
		$criteria->addCondition('user_id = '.Yii::app()->user->id);
		
		$model = Board::model()->find($criteria);
		
		if($model===null)
		{
			throw new CHttpException(404,'The requested page does not exist.');
		}
	
		if($model->delete())
		{
			$this->redirect(Yii::app()->createUrl('/profile/myboard'));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionExtend($id)
	{
		$model = $this->loadModel($id);
		$model->date_add = time();
		if($model->save())
		{
			Yii::app()->user->setFlash('message', 'Срок размещения вашего объявления продлен на 30 дней.');
			$this->redirect(Yii::app()->createUrl('/profile/myboard'));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Board::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='board-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
