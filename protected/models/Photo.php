<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $id_photo
 * @property integer $id_board
 * @property string $photo
 * @property string $thumb
 *
 * The followings are the available model relations:
 * @property Board $idBoard
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photo the static model class
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
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo, thumb', 'required'),
			array('id_board', 'numerical', 'integerOnly'=>true),
			array('photo, thumb', 'length', 'max'=>255),
			//array('photo, thumb','file','types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_photo, id_board, photo, thumb', 'safe', 'on'=>'search'),
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
			'id_photo' => 'Id Photo',
			'id_board' => 'Id Board',
			'photo' => 'Photo',
			'thumb' => 'Thumb',
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

		$criteria->compare('id_photo',$this->id_photo);
		$criteria->compare('id_board',$this->id_board);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('thumb',$this->thumb,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}