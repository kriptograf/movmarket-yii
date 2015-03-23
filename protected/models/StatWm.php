<?php

/**
 * This is the model class for table "stat_wm".
 *
 * The followings are the available columns in table 'stat_wm':
 * @property integer $id
 * @property string $purse
 * @property string $wmid
 * @property string $type
 * @property string $completed
 * @property integer $id_board
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Board $idBoard
 */
class StatWm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StatWm the static model class
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
		return 'stat_wm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('purse, wmid, type, date', 'required'),
			array('id_board', 'numerical', 'integerOnly'=>true),
			array('purse', 'length', 'max'=>13),
			array('wmid', 'length', 'max'=>12),
			array('type', 'length', 'max'=>255),
			array('completed', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, purse, wmid, type, completed, id_board, date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'purse' => 'Purse',
			'wmid' => 'Wmid',
			'type' => 'Type',
			'completed' => 'Completed',
			'id_board' => 'Id Board',
			'date' => 'Date',
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
		$criteria->compare('purse',$this->purse,true);
		$criteria->compare('wmid',$this->wmid,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('completed',$this->completed,true);
		$criteria->compare('id_board',$this->id_board);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}