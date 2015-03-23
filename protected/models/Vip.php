<?php

/**
 * This is the model class for table "vip".
 *
 * The followings are the available columns in table 'vip':
 * @property integer $id
 * @property integer $id_board
 * @property integer $user_id
 * @property integer $kill_time
 * @property string $pay
 *
 * The followings are the available model relations:
 * @property Board $idBoard
 * @property User $user
 */
class Vip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vip the static model class
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
		return 'vip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_board, user_id', 'required'),
			array('id_board, user_id, kill_time', 'numerical', 'integerOnly'=>true),
			array('pay', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_board, user_id, kill_time, pay', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idBoard' => array(self::BELONGS_TO, 'Board', 'id_board'),
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
			'id_board' => 'Id Board',
			'user_id' => 'User',
			'kill_time' => 'Kill Time',
			'pay' => 'Pay',
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
		$criteria->compare('id_board',$this->id_board);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('kill_time',$this->kill_time);
		$criteria->compare('pay',$this->pay,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}