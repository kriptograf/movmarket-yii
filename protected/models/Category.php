<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $child
 * @property string $name_cat
 * @property string $description
 * @property string $img
 * @property integer $sort_index
 * @property string $type_filters
 *
 * The followings are the available model relations:
 * @property Board[] $boards
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_cat, description, img, sort_index, type_filters', 'required'),
			array('parent_id, child, sort_index', 'numerical', 'integerOnly'=>true),
			array('name_cat, description, img', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, child, name_cat, description, img, sort_index', 'safe', 'on'=>'search'),
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
			'boards' => array(self::HAS_MANY, 'Board', 'id_category'),
			'types' => array(self::BELONGS_TO, 'Types', 'type_filters'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'child' => 'Child',
			'name_cat' => 'Название категории',
			'description' => 'Описание',
			'img' => 'Изображение',
			'sort_index' => 'Сортировка',
			'type_filters'=>'Фильтры',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('child',$this->child);
		$criteria->compare('name_cat',$this->name_cat,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('sort_index',$this->sort_index);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function parents($id=1)
	{
	    $this->getDbCriteria()->mergeWith(array(
	        'parent_id'=>$id,
	        'limit'=>1,
	    ));
	    return $this;
	}
	
	public function getTypes()
	{
		return array(
			's'=>'Продам',
			'p'=>'Куплю',
			'u'=>'Меняю',
			'o'=>'Сдам',
			'c'=>'Сниму',
			'd'=>'Предоставляю',
			't'=>'Требуются',
		);
	}


	public static function getMenuChilds($id)
    {
        $data = array();
		
        $array_cat = Category::model()->findAll('parent_id = ' . $id);
        
        foreach ($array_cat as $model)
        {
        	$row['id'] = $model->id;

            $row['name'] = $model->name_cat;
            
			$row['child'] = (Category::getMenuChilds($model->id))? Category::getMenuChilds($model->id) : null;
			
			if(!$row['child'])
			{
				unset($row['child']);
				if($model->parent_id==0)
				{
					$row['level']=0;
				}
				else
				{
					$row['level']=1;
				}
				
			}
            $data[] = $row;
        }
        return $data;
    }
    // Функция выполняющая рекурсивный спуск по массиву 
    public static function displayRecursive($data)
    {
    	
    	if(is_array($data))
    	{
    		foreach ($data as $item)
    		{
    			echo $item['level'].'<br>';
    			if($item['level']==0)
    			{
    				echo '<strong>'.$item['id'].'-'.$item['name'].'</strong><br>';
    			}
    			elseif ($item['level']!=0) 
    			{
    				echo $item['id'].'-'.$item['name'].'<br>';
    			}
    			
    			
    			if(isset($item['child']) && is_array($item['child']))
    			{
    				Category::displayRecursive($item['child']);
    			}
    					
    		}
    	}
    }
    
    /**************************************************************************/
    /**
     * Получить все категории данных, подготовленных для вставки в $form->dropDownList
     * 
     * @return array
     */
    public function getAllCategoriesForSelect() 
    {
    	/**
    	 * Все записи
    	 * @var unknown_type
    	 */
        $categoryData = Category::model()->findAll();
        
        //echo CVarDumper::dump($categoryData,10,true);exit;
        
        $categoryDataTree = Category::model()->dbResultToForest($categoryData, 'id', 'parent_id', 'name_cat');
        
        //echo CVarDumper::dump($categoryDataTree,10,true);exit;
        /**
         * Оптгруп создается только в случае если есть дочерние категории
         * @var unknown_type
         */
        $categoryDataSelect = Category::model()->converTreeArrayToSelect($categoryDataTree, 2);
        
        //echo CVarDumper::dump($categoryDataSelect,10,true);exit;
        
        //echo CVarDumper::dump(CHtml::listData($categoryDataSelect, 'id', 'value', 'group'),10,true);exit;
        
        return CHtml::listData($categoryDataSelect, 'id', 'value', 'group');
    }

    /**
     * Построить иерархическую структуру из результата запроса к DB. 
     * Результат должна содержать ID, parent_id, значение
     * 
     * @param Object $rows
     * @param string $idName Название идентификатора ключа в результате запроса
     * @param string $pidName имя идентификатора родителя в результате запроса
     * @param string $labelName имя значения поля в результате запроса
     * @return array иерархическое дерево
     */
    public function dbResultToForest($rows, $idName, $pidName, $labelName = 'label') 
    {
        $totalArray = array();
        
        $children = array(); // Дети каждого ID
        
        $ids = array();
        
        $k=0;
        
        /**
         * Собираем елементы которые являются детьми.
         */ 
        foreach ($rows as $i=>$r) 
        {
            $element = array(
            'id'=>$rows[$i][$idName], 
            'parent_id' => $rows[$i][$pidName], 
            'value' => $rows[$i][$labelName]);
            
            $totalArray[$k++] = $element;
            
            $row =  &$totalArray[$k-1];
            
            $id = $row['id'];
            
            if ($id === null) 
            {
                /**
                 * Строки без ID полностью недействительным 
                 * и делает результат дерево, чтобы быть пустым 
                 * (потому что parent_id = NULL означает "корень дерева"). 
                 * Так что пропустить их полностью.
                 */ 
                continue;
            }
            $pid = $row['parent_id'];
            
            if ($id == $pid) 
            {
                $pid = null;
            }
            $children[$pid][$id] =& $row;
            
            if (!isset($children[$id])) 
            {
                $children[$id] = array();
            }
            $row['childNodes'] = &$children[$id];
            
            $ids[$id] = true;
        }
        
        // Корневые элементы являются элементами с не найденым PID.
        $forest = array();
        
        foreach ($totalArray as $i => $r) 
        {
            $row = &$totalArray[$i];
            
            $id = $row['id'];
            
            $pid = $row['parent_id'];
            
            if ($pid == $id) $pid = null;
            
            if (!isset($ids[$pid])) 
            {
                $forest[$row[$idName]] =& $row;
            }
        }
        return $forest;
    }

    /**
     * Рекурсивные функции преобразования дерева, 
     * как массив в один массив с разделением на oprgroup. 
     * Такой тип массива используется для создания раскрывающегося списка
     * 
     * @param array $data data of tree like
     * @param int $level Нынешний уровень рекурсивной функции
     * @return array converted array
     */
    public function converTreeArrayToSelect($data, $level = 0) 
    {
    	$returnArray = array();//результирующий массив
    	
		//перебираем корневые элементы
        foreach($data as $item) 
        { 
        	//Если корневой элемент имеет потомка, перебираем потомков	
        	if ($item['childNodes']) 
            {
            	foreach ($item['childNodes'] as $child)
            	{
            		//добавляем к потомку название корневой категории для тега oprgroup
            		$child['group']=$item['value'];
            		//записываем все это дело в массив
            		$returnArray[] = $child;
            	}         
            }
        }
        /**
         * В результате манипуляций получаем такой массив для передачи в listData()
         * array
			(
			    0 => array
			    (
			        'id' => '7'
			        'parent_id' => '1'
			        'value' => 'subfirst'
			        'childNodes' => array()
			        'group' => 'first'
			    )
			    1 => array
			    (
			        'id' => '8'
			        'parent_id' => '1'
			        'value' => 'werwerwe'
			        'childNodes' => array()
			        'group' => 'first'
			    )
			    2 => array
			    (
			        'id' => '4'
			        'parent_id' => '2'
			        'value' => 'asdf'
			        'childNodes' => array()
			        'group' => 'second'
			    )
			    3 => array
			    (
			        'id' => '9'
			        'parent_id' => '2'
			        'value' => 'werwerwer'
			        'childNodes' => array()
			        'group' => 'second'
			    )
			    4 => array
			    (
			        'id' => '10'
			        'parent_id' => '3'
			        'value' => 'fdgvxcvxcvxc'
			        'childNodes' => array()
			        'group' => 'third'
			    )
			    5 => array
			    (
			        'id' => '11'
			        'parent_id' => '3'
			        'value' => 'wrwerwetutyurtyr'
			        'childNodes' => array()
			        'group' => 'third'
			    )
			    6 => array
			    (
			        'id' => '12'
			        'parent_id' => '6'
			        'value' => 'qqqqqqqqq'
			        'childNodes' => array()
			        'group' => 'root'
			    )
			)
         */
        return $returnArray;
    }
 
}