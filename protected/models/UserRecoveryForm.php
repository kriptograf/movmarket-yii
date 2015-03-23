<?php

/**
 * UserRecoveryForm class.
 * UserRecoveryForm is the data structure for keeping
 * user recovery form data. It is used by the 'recovery' action of 'UserController'.
 */
class UserRecoveryForm extends CFormModel 
{
	public $email, $user_id;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email', 'required'),
			// password needs to be authenticated
			array('email', 'checkexists'),
		);
	}
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'email'=>'Email',
		);
	}
	
	public function checkexists($attribute,$params)
    {
		if(!$this->hasErrors())  // we only want to authenticate when no input errors
		{

				$user=User::model()->findByAttributes(array('email'=>$this->email));
				if ($user)
				{
					$this->user_id=$user->id_user;
				}
				else 
				{
					$this->addError("email","Email is incorrect.");
				}			
		}
	}
	
}