<?php
class LoginController extends Controller
{
	public $defaultAction = 'login';
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(!Yii::app()->user->isGuest)
		{
			$this->redirect(Yii::app()->user->returnUrl);
		}
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			/**
			 * Если пользователь прошел проверку и аутентифицирован,
			 * то редиректим его на страницу с которой он пришел
			 */
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
			}
				
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
}