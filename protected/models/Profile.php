<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $phone
 * @property integer $city_id
 *
 * The followings are the available model relations:
 * @property City $city
 * @property User $user
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
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
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, city_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>255),
			array('username', 'filter', 'filter'=>array( $this, 'HtmlFilter' )),
			array('phone', 'numerical'),
			array('phone', 'length', 'min'=>10, 'max'=>13),
			array('phone', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/', 'message'=>'Телефон должен быть в формате +ХХХХХХХХХХХ или ХХХХХХХХХХХ'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, username, phone, city_id', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'username' => 'Полное имя',
			'phone' => 'Телефон',
			'city_id' => 'Город',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('city_id',$this->city_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}