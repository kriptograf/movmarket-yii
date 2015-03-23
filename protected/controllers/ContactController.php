<?php
class ContactController extends Controller
{
	public $defaultAction = 'contact';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xF5F5F5,
				'foreColor'=> 0x000000,
                'height'=>80,
				'fontFile'=>'./fonts/Lithos.otf',
			),
		);
	}
	
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
}