<?php
/**
 * Email class file.
 * Это письмо расширение. Позволяет таких областях, как BCC, CC, 
 * ответ-адресам и другие. Также имеет отличные режим отладки, 
 * в которой расширение на самом деле не отправлять письма, но 
 * вместо этого выводит его на экран.
 * 
 * Вы можете настроить расширение
 * 'components'=>array(
 *  'email'=>array(
 *       'class'=>'application.extensions.email.Email',
 *       'delivery'=>'php', //Will use the php mailing function.  
 *       //May also be set to 'debug' to instead dump the contents of the email into the view
 *   ),
 *
 * Вам нужно положить отладки виджетов где-то в представлении, 
 * или макета, если вы хотите использовать режим отладки
 * <?php $this->widget('application.extensions.email.debug'); ?>
 * 
 * Example code:
 * $email = Yii::app()->email;
 * $email->to = 'admin@example.com';
 * $email->subject = 'Hello';
 * $email->message = 'Hello brother';
 * $email->send();
 * 
 * Вместо определения сообщение с $ электронной почты> сообщение, 
 * вы могли бы вместо этого определить вид (и макета, если хотите) 
 * для использования в качестве содержимого электронной почты. 
 * Это гораздо более гибким и поддерживает MVC лучше.
 * 
 * $email = Yii::app()->email;
 * $email->to = 'to@mail.com';
 * $email->subject = 'Subject text';
 * $email->view = 'myview';
 * $email->viewVars = array('var1'=>$var1,'var2'=>$var2);
 * $email->send();
 *
 * Далее, вам нужно, чтобы создать представление в 
 * /protected/views/email/myview.php
 * Some email vars:<br>
 * Email:<?php echo $email->subject ?>
 * <br>
 * From:<?php echo $email->from ?>
 * <br>
 * Now, my own vars:<br>
 * Var1:<?php echo $var1 ?>
 * <br>
 * Var2:<?php echo $var2 ?>
 *
 * @author Jonah Turnquist <poppitypop@gmail.com>
 * @link http://php-thoughts.cubedwater.com/
 * @version 1.0
 */
class Email extends CApplicationComponent {
	/**
	 * @var string Type of email.  Options include "text/html" and "text/plain"
	 */
	public $type = 'text/html';
	/**
	 * @var string Receiver, or receivers of the mail.
	 */
	public $to = null;
	
	/**
	 * @var string Email subject
	 */
	public $subject = '';
	
	/**
	 * @var string from address
	 */
	public $from = null;
	
	/**
	 * @var string Reply-to address
	 */
	public $replyTo = null;
	
	/**
	 * @var string Return-path address
	 */
	public $returnPath = null;
	
	/**
	 * @var string Carbon Copy
	 *
	 * List of email's that should receive a copy of the email.
	 * The Recipient WILL be able to see this list
	 */
	public $cc = null;

	/**
	 * @var string Blind Carbon Copy
	 *
	 * List of email's that should receive a copy of the email.
	 * The Recipient WILL NOT be able to see this list
	 */
	public $bcc = null;
	
	/**
	 * @var string Main content
	 */
	public $message = '';
	
	/**
	 * @var string Delivery type.  If set to 'php' it will use php's mail() function, and if set to 'debug'
	 * it will not actually send it but output it to the screen
	 */
	public $delivery = 'php';
	
	/**
	 * @var string language to encode the message in (eg "Japanese", "ja", "English", "en" and "uni" (UTF-8))
	 */
	public $language= 'uni';
	
	/**
	 * @var string the content-type of the email
	 */
	public $contentType= 'UTF-8';
	
	/**
	 * @var string The view to use as the content of the email, as an alternative to setting $this->message.
	 * Must be located in application.views.email directory.  This email object is availiable within the view
	 * through $email, thus letting you define things such as the subject within the view (helps maintain 
	 * seperation of logic and output).
	 */
	public $view = null;
	
	/**
	 * @var array Variable to be sent to the view.
	 */
	public $viewVars = null;	
	
	/**
	 * @var string The layout for the view to be imbedded in. Must be located in
	 * application.views.email.layouts directory.  Not required even if you are using a view
	 */
	public $layout = null;
	
	/**
	 * @var integer line length of email as per RFC2822 Section 2.1.1
	 */
	public $lineLength = 70;
	
	public function __construct() 
	{
		Yii::setPathOfAlias('email', dirname(__FILE__).'/views');
	}
	
	/**
	 * Sends email.
	 * @param mixed the content of the email, or variables to be sent to the view.
	 * If not set, it will use $this->message instead for the content of the email
	 */
	public function send($arg1=null) 
	{
		if ($this->view !== null) 
		{
			if ($arg1 == null)
				$vars = $this->viewVars;
			else
				$vars = $arg1;
			
			$view = Yii::app()->controller->renderPartial('application.views.email.'.$this->view, array_merge($vars, array('email'=>$this)), true);
			if ($this->layout === null) 
			{
				$message = $view;
			} 
			else 
			{
				$message = Yii::app()->controller->renderPartial('application.views.email.layouts.'.$this->layout, array('content'=>$view), true);
			}
		} 
		else 
		{
			if ($arg1 === null) 
			{
				$message = $this->message;
			} 
			else 
			{
				$message = $arg1;
			}
		}

		//process 'to' attribute
		$to = $this->processAddresses($this->to);
		return $this->mail($to, $this->subject, $message);
	}
	
	private function mail($to, $subject, $message) 
	{
		switch ($this->delivery) 
		{
			case 'php':
				$message = wordwrap($message, $this->lineLength);
                /**
                 * при использовании UTF-8 может ломаться кодировка на этапе выполнения функции Email::mail .
                 * При определенных настройках веб-сервера или php, когда в каком-то из них указана другая, не UTF-8 кодировка,
                 * mb_language считает, что текущая кодировка установлена в windows=1251 .
                 * Если ваш скрипт при этом выполняется в utf-8, то тело и заголовок письма будут кодированы в нечитаемый вид.
                 * Чтобы кодировка не ломалась, нужно перед вызовом mb_language() явно указать кодировку: mb_internal_encoding("UTF-8"):
                 */
                mb_internal_encoding("UTF-8");
				mb_language($this->language);
				return mb_send_mail($to, $subject, $message, implode("\r\n", $this->createHeaders()));
			case 'debug':
				$debug = Yii::app()->controller->renderPartial('email.debug',
						array_merge(compact('to', 'subject', 'message'), array('headers'=>$this->createHeaders())),
						true);
				Yii::app()->user->setFlash('email', $debug);
				break;
		}
	}
	private function createHeaders() 
	{
		$headers = array();
		
		//maps class variable names to header names
		$map = array(
			'from' => 'From',
			'cc' => 'Cc',
			'bcc' => 'Bcc',
			'replyTo' => 'Reply-To',
			'returnPath' => 'Return-Path',
		);
		foreach ($map as $key => $value) 
		{
			if (isset($this->$key))
				$headers[] = "$value: {$this->processAddresses($this->$key)}";
		}
		$headers[] = "Content-Type: {$this->type}; charset=".$this->contentType;
		$headers[] = "MIME-Version: 1.0";
		
		return $headers;
	}
	private function processAddresses($addresses) 
	{
		return (is_array($addresses)) ? implode(', ', $addresses) : $addresses;
	}
}