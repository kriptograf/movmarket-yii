<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $autor
 * @property string $logo
 * @property string $short
 * @property string $full
 * @property string $keywords
 * @property string $descr
 * @property integer $hits
 * @property integer $date
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, autor, logo, short, full, keywords, descr, hits, date', 'required'),
			array('hits, date', 'numerical', 'integerOnly'=>true),
			array('title, logo, keywords, descr', 'length', 'max'=>255),
			array('autor', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, autor, logo, short, full, keywords, descr, hits, date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'autor' => 'Autor',
			'logo' => 'Logo',
			'short' => 'Short',
			'full' => 'Full',
			'keywords' => 'Keywords',
			'descr' => 'Descr',
			'hits' => 'Hits',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('short',$this->short,true);
		$criteria->compare('full',$this->full,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('descr',$this->descr,true);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('date',$this->date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}