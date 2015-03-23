<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $active
 * @property integer $superuser
 * @property string $forgot
 * @property string $change_code
 *
 * The followings are the available model relations:
 * @property Board[] $boards
 * @property Company[] $companies
 * @property Profile[] $profiles
 * @property Vip[] $vips
 */
class User extends CActiveRecord
{
	const STATUS_NOACTIVE='no';
	const STATUS_ACTIVE='yes';
	const STATUS_BANED=-1;
	
	public $verifyPassword;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, email', 'required'),
			array('superuser', 'numerical', 'integerOnly'=>true),
			array('login, password, email', 'length', 'max'=>255),
			array('email','email'),
			array('login, email','unique'),
			
			array('login','filter', 'filter'=>array( $this, 'HtmlFilter' )),
			
			array('active', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, login, password, email, active, superuser, forgot, change_code', 'safe', 'on'=>'search'),
		);
	}
	
	public function HtmlFilter($data)
	{
		return CHtml::encode($data);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'boards' => array(self::HAS_MANY, 'Board', 'user_id'),
			'companies' => array(self::HAS_MANY, 'Company', 'user_id'),
			'profiles' => array(self::HAS_MANY, 'Profile', 'user_id'),
			'vips' => array(self::HAS_MANY, 'Vip', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'login' => 'Имя пользователя',
			'password' => 'Пароль',
			'email' => 'Email',
			'active' => 'Active',
			'superuser' => 'Superuser',
			'verifyPassword' => 'Подтверждение пароля',
		);
	}
	
	/**
	 * Именованные условия выборки
	 * 
	 */
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'active="'.self::STATUS_ACTIVE.'"',
            ),
            'notactvie'=>array(
                'condition'=>'active="'.self::STATUS_NOACTIVE.'"',
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
        );
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('superuser',$this->superuser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function validatePassword($password)
    {
        return $this->hashPassword($password,$this->salt)===$this->password;
    }

    public function hashPassword($password,$salt)
    {
        return md5($salt.$password);
    }
    
    /**
     * Валидация email адреса
     * @param unknown_type $email
     */
    public function validateEmail($email)
    {
	    $validator = new CEmailValidator;
	    
		if(!$validator->validateValue($email))
		{
		   return false;
		}
		else 
		{
			return true;
		}
    }
    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    protected function generateSalt()
    {
        return uniqid('',true);
    }

    protected  function beforeSave()
    {
        parent::beforeSave();
        if ($this->isNewRecord)
        {
        	$this->setAttribute('salt', md5($this->getAttribute('salt')));
        	$this->setAttribute('password', md5($this->getAttribute('salt').$this->getAttribute('password')));
        }
        
        return TRUE;
    }

}