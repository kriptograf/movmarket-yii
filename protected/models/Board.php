<?php

/**
 * This is the model class for table "board".
 *
 * The followings are the available columns in table 'board':
 * @property integer $id
 * @property integer $id_category
 * @property integer $user_id
 * @property string $type
 * @property string $autor
 * @property string $title
 * @property string $email
 * @property integer $id_city
 * @property string $url
 * @property integer $click
 * @property string $contacts
 * @property string $text
 * @property integer $price
 * @property string $video
 * @property integer $hits
 * @property string $checked
 * @property integer $top_time
 * @property string $tags
 * @property integer $time_delete
 * @property integer $date_add
 * @property integer $id_region
 * @property integer $id_country
 * @property integer $vip
 * @property integer $viptime
 * @property integer $highlight
 * @property integer $highlight_time
 * @property string $currency
 *
 * The followings are the available model relations:
 * @property Category $idCategory
 * @property User $user
 * @property City $city
 * @property Region $region
 * @property Country $country
 * @property Comments[] $comments
 * @property Photo[] $photos
 * @property StatWm[] $statWms
 * 
 */
class Board extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Board the static model class
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
		return 'board';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_category, autor, title, id_city, id_region, id_country, contacts, text, price, top_time, date_add, currency', 'required'),
			array('id_category, user_id, id_city, id_region, id_country, click, price, hits, top_time, time_delete, date_add, vip, highlight', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>1),
			array('autor, title, email, url, tags', 'length', 'max'=>255),
			array('video', 'length', 'max'=>128),
			array('checked', 'length', 'max'=>4),
			array('email', 'email'),
			//фильтр
			array('autor, title, contacts, text, price, url', 'filter',  'filter'=>array( $this, 'HtmlFilter' )),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_category, user_id, type, autor, title, email, id_city, id_region, id_country, url, click, contacts, text, price, video, hits, checked, top_time, tags, time_delete, date_add, viptime, highlight_time', 'safe', 'on'=>'search'),
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
			'idCategory' => array(self::BELONGS_TO, 'Category', 'id_category'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'city' => array(self::BELONGS_TO, 'City', 'id_city'),
			'region' => array(self::BELONGS_TO, 'Region', 'id_region'),
			'country' => array(self::BELONGS_TO, 'Country', 'id_country'),
			'comments' => array(self::HAS_MANY, 'Comments', 'id_board'),
			'photos' => array(self::HAS_MANY, 'Photo', 'id_board'),
			'statWms' => array(self::HAS_MANY, 'StatWm', 'id_board'),
			'favorite' => array(self::HAS_MANY, 'Favorites', 'board_id'),
			'location'=>array(self::HAS_ONE, 'Location', 'board_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_category' => 'Категория',
			'user_id' => 'Пользователь',
			'type' => 'Тип объявления',
			'autor' => 'Автор',
			'title' => 'Заголовок',
			'email' => 'Email',
			'id_city' => 'Город',
			'id_region' => 'Регион',
			'id_country' => 'Страна',
			'url' => 'Ссылка',
			'click' => 'Click',
			'contacts' => 'Контакты',
			'text' => 'Текст',
			'price' => 'Цена',
			'video' => 'Видео',
			'hits' => 'Hits',
			'checked' => 'Checked',
			'top_time' => 'Top Time',
			'tags' => 'Теги',
			'time_delete' => 'Time Delete',
			'date_add' => 'Date Add',
			'vip'=>'VIP',
			'highlight'=>'highlight',
			'currency'=>'Валюта',
		);
	}
	
	public function getCurrencies()
	{
		return array(
			'грн.'=>'грн.',
			'$'=>'$',
			'&euro;'=>'€',
		);
	}
	
	public function getTypes($cat_id)
	{
		$cat = Category::model()->findByPk(intval($cat_id));
		
		if(!$cat)
		{
			return false;
			Yii::app()->end();
		}
		/**
		 * Десериализуем фильтры для выбранной категории
		 * @var unknown_type
		 */
		$data = unserialize($cat->types->filter);
		
		return $data;
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
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('click',$this->click);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('checked',$this->checked,true);
		$criteria->compare('top_time',$this->top_time);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('time_delete',$this->time_delete);
		$criteria->compare('date_add',$this->date_add);
		$criteria->compare('id_region',$this->id_region);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('vip',$this->vip);
		$criteria->compare('highlight',$this->highlight);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}