<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $id_company
 * @property integer $category_id
 * @property string $city_id
 * @property string $name
 * @property string $logo
 * @property string $description
 * @property string $contacts
 * @property string $top
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property City $city
 * @property User $user
 * @property CompanyCategory $category
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, city_id', 'required'),
			array('category_id, user_id', 'numerical', 'integerOnly'=>true),
			array('city_id', 'length', 'max'=>11),
			array('name, logo', 'length', 'max'=>255),
			array('top', 'length', 'max'=>1),
			array('description, contacts', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_company, category_id, city_id, name, logo, description, contacts, top, user_id', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'category' => array(self::BELONGS_TO, 'CompanyCategory', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_company' => 'Id Company',
			'category_id' => 'Category',
			'city_id' => 'City',
			'name' => 'Name',
			'logo' => 'Logo',
			'description' => 'Description',
			'contacts' => 'Contacts',
			'top' => 'Top',
			'user_id' => 'User',
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

		$criteria->compare('id_company',$this->id_company);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('top',$this->top,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}