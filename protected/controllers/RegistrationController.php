<?php

class RegistrationController extends Controller
{
    public $defaultAction = 'registration';
    
	
	public function actionRegistration()
	{
		/**
		 * Если пользователь авторизован, перенаправляем на главную страницу
		 */
		if (!Yii::app()->user->isGuest)
		{
			$this->redirect('/');
		}
		
        $model = new User;
        
        $profile = new Profile();

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        
        if(!Yii::app()->user->getFlash('url_referer'))
        {
        	Yii::app()->user->setFlash('url_referer', Yii::app()->request->getUrlReferrer());
        }

        

        if(isset($_POST['User']))
        {
        	/**
        	 * Если данные пришли из формы, заполняем атрибуты модели User
        	 */
            $model->attributes = $_POST['User'];

            if($model->save())
            {
            	/**
            	 * Если пользователя сохранили, заполняем поля модели Profile
            	 */
            	$profile->user_id = $model->id_user;
            	$profile->username = $_POST['Profile']['username'];
            	
            	if ($profile->save())
            	{
            		/**
            		 * Оптравляем уведомление админу
            		 */
            		$email = Yii::app()->email;
					$email->to = 'foreach@mail.ru';
					$email->subject = 'movmarket.biz - Регистрация пользователя';
					$email->view = 'register';
					$email->viewVars = array('username'=>$_POST['User']['login'],'date_register'=>date('d.m.Y H:i', time()), 'useremail'=>$_POST['User']['email']);
					$email->send();

            		/**
            		 * Если профиль сохранен, перенаправляем пользователя на главную
            		 * И передаем флеш сообщение
            		 */
            		Yii::app()->user->setFlash('message', '<div class="alert alert-success">Спасибо за регистрацию на нашем ресурсе. Теперь вы можете пользоваться всеми услугами и сервисами.</div>');
            		
            		$identity = new UserIdentity($_POST['User']['login'], $_POST['User']['password']);
					$identity->authenticate();
					if($identity->errorCode===UserIdentity::ERROR_NONE)
					{
						Yii::app()->user->login($identity);
						$this->redirect(Yii::app()->user->returnUrl);
					}
            	}
            	
            }
                
        }

        $this->render('registration',array(
            'model'=>$model,
        	'profile'=>$profile,
        ));
	}

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}