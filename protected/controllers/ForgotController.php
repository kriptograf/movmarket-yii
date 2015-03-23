<?php
class ForgotController extends Controller
{
	public function actionIndex()
    {
    	/**
    	 * Форма восстановления пароля
    	 * @var unknown_type
    	 */
		$form = new UserRecoveryForm;
		/**
		 * Если пользователь авторизован, редиректим на главную
		 */
		if (Yii::app()->user->id)
        {
		    	$this->redirect(Yii::app()->homeUrl);
		}
        else
        {
        	/**
        	 * Пытаемся получить имейл из строки запроса
        	 * @var unknown_type
        	 */
			$email = ((isset($_GET['email']))?$_GET['email']:'');
			
			/**
			 * Пытаемся получить код восстановления пароля из строки запроса
			 * @var unknown_type
			 */	
			$code = ((isset($_GET['code']))?$_GET['code']:'');
			/**
			 * Если имейл и код существуют
			 */
			if ($email && $code)
            {
            	
            	/**
            	 * Форма смены пароля
            	 * @var unknown_type
            	 */
				$form2 = new UserChangePassword;
				/**
				 * Ищем пользователя по имейлу
				 * @var unknown_type
				 */
		    	$find = User::model()->findByAttributes(array('email'=>$email));
		    	
		    	if(isset($find) && $find->forgot==$code)
                {
                	/**
                	 * Если пользователь найден, рендерим форму смены пароля
                	 */
			    	if(isset($_POST['UserChangePassword']))
                    {
                    	/**
                    	 * Если данные пришли методом пост, заполняем атрибуты модели
                    	 */
						$form2->attributes = $_POST['UserChangePassword'];
						/**
						 * Если поля формы прошли валидацию
						 */
						if($form2->validate())
                        {
                        	
                        	/**
                        	 * Новый пароль
                        	 */
							$find->password = $find->hashPassword($form2->password, $find->salt);
							/**
							 * Новый код восстановления
							 */
							$find->forgot = md5(microtime().$form2->password);
							//echo CVarDumper::dump($find->salt, 10 ,true);
							//echo CVarDumper::dump($find->password, 10 ,true);exit;
							if($find->save())
							{
								Yii::app()->user->setFlash('message', '<div class="alert alert-info">Новый пароль сохранен.</div>');
								$this->redirect(Yii::app()->homeUrl);
							}
								
						}
					} 
					$this->render('forgotten',array('model'=>$form2));
		    	}
                else
                {
		    			Yii::app()->user->setFlash('message','<div class="alert alert-info">Не правильная ссылка восстановления пароля.</div>');
						$this->redirect(Yii::app()->homeUrl);
		    	}
		    }
            else
            {
            	/**
            	 * Если нет имейла и кода, проверяем есть ли пост данные из формы восстановления пароля
            	 */
			    if(isset($_POST['UserRecoveryForm']))
                {
                	/**
                	 * Заполняем атрибуты модели
                	 */
			    	$form->attributes=$_POST['UserRecoveryForm'];
			    	/**
			    	 * Если форма прошла валидацию имейла
			    	 */	
			    	if($form->validate())
                    {
                    	/**
                    	 * Получаем пользователя по идентификатору
                    	 * @var unknown_type
                    	 */
			    		$user = User::model()->findbyPk($form->user_id);
			    		
			    		/**
						 * Код восстановления пароля
						 * @var unknown_type
						 */
						$code = md5(time());
						/**
						 * Присваиваем атрибуту модели код
						 */
						$user->forgot = $code;
						/**
						 * Если код сохранен в бд формируем ссылку и отправляем письмо
						 */
						if($user->save())
						{
							$activation_url = Yii::app()->createAbsoluteUrl('forgot/index', array('email'=>$user->email, 'code'=>$code));// 'http://'.$_SERVER['HTTP_HOST'].Yii::app()->createUrl('/forgot', array('email'=>$user->email, 'code'=>$code));
							
							$subject = 'Восстановление пароля';
							
			    			$link = '<a href="'.$activation_url.'">'.$activation_url.'</a>';
						
							$message = '<p>Вы или кто-то другой инициировали восстановление пароля. Если это сделали вы, то пройдите пожалуйста по ссылке ниже.</p>';
							$message .= '<p>';
							$message .= $link;
							$message .= '</p>';
							
							if(mail($to, $subject, $message))
							{
								Yii::app()->user->setFlash('message','<div class="alert alert-info">Пожалуйста проверьте ваш email. Вам отправлены инструкции по восстановлению пароля.</div>');
			    				$this->redirect(Yii::app()->homeUrl);
							}
			    			
							
						}
					
						
			    	}
			    }
			    /**
			     * Если данных пост нет рендерим форму восстановления пароля
			     */
		    	$this->render('forgot',array('model'=>$form));
		    	}
		    }
	}
	
}