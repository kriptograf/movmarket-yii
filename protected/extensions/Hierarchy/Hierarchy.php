<?php
 
class Hierarchy extends CApplicationComponent
{
			
	/*	
	public function loadModel($className) 
	{	                               
		$id = $className;
		if(Yii::app()->cache->get("cat_{$id}") === false) 
		{
			$model = CActiveRecord::model($className)->findAll(array('order' => 'sort')); 
			Yii::app()->cache->set("cat_{$id}",$model);
		}else{ 
			$model = Yii::app()->cache->get("cat_{$id}");	
		}

		return $model; 	
	}			   
	*/	  
		  
	
	// получаем всю таблицу разделов
	public function loadModel($className) 
	{	
		return $model = CActiveRecord::model($className)->findAll(array('order' => 'sort_index'));  
	}			   
	 
			  
	
	// массив где в качестве ключа ID 
	public function getDataID( $model=array() ) 
	{	
		 $arr = array();  
		 foreach($model as $row) 
		 {
			  $arr[$row['id']] = array('id'=>$row['id'], 'parent_id' => $row['parent_id'], 'name_cat' => $row['name_cat']);
		 }	
		 return $arr;
	}		  
	   
				  
			   
	   
	// массив где в качестве ключа Parent 
	public function getDataParent( $model=array() ) 
	{	
		 $arr = array();  
		 foreach($model as $row) 
		 {  
			  $arr[$row['parent_id']][] = array('id'=>$row['id'], 'parent_id' => $row['parent_id'], 'name_cat' => $row['name_cat']);  // ���������� ������� �� ������  
		 }	
		 return $arr;
	}	  
			
			
				  
				  
	/**
	 * Создание древовидного меню 
	 */	
	  
	//  получаем массив родителей  
	public function TreePath($arr,$id)		
	{   
				  
	  //if($id <= 0 || $id > sizeof($arr) ) return null;
 
		 $path = array(); 
		 $parent = $arr[$id]['parent_id']; 
		 //$path[$arr[$id]['id']] = $arr[$id]['id'];
		 $path[] = $arr[$id]['id'];
		 
		  while($parent)               
		  {     
			  //$path[$arr[$parent]['id']] = $arr[$parent]['id'];
			  $path[] = $arr[$parent]['id'];  
			  $parent = $arr[$parent]['parent_id'];   
		  }      

	  //$path = array_reverse($path);
	  //return $path;
	  print_r($path);
	} 
	
	
	// склееваем разделы parent=0 и ветку с выбраным ID раздела по $selectID			
	public function TreeMergeArray( $model=array(), $selectID = 0) 
	{	
	
		 $path = $this->TreePath($model, $selectID );
		 
		 $arr = array();
		 foreach($model as $row) {
		   if($row['parent_id'] == 0)
		   {   
			  $arr[0][] = $row;			  	   
		   }  
		 } 

				 
		 if( sizeof($path) > 0 )
		 {    
			  $arr['path'] = $path;
												  
			  foreach($model as $v) 
			  {   
				if (in_array($v['parent_id'], $path)) { 
				   $arr[$v['parent_id']][] = $v;					 
				}
			  }												   
		 } 		 
		 //return $arr;  
		 print_r($arr);
	}	  
		  
	  
	// строим ветку ввиде списка <ul> и <li>				
	public function TreeRecursive($model, $parent, $lvl) 
	{ 		

		 static $out = '';
		 if (!isset($model[$parent])) return null;
			$indent =  str_repeat('  ', $lvl); 
			
			if($lvl == 0){
			  $out .= $indent.'<ul class="menu">'."\n";
			}else{
			  $out .= $indent.' <ul>'."\n";
			}                  
			 
			foreach($model[$parent] as $v) 
			{  
 
			   if($model['path'][0] == $v['id']) {
				  $cur_sel = ' class="current"';	   
			   }elseif( in_array($v['id'], $model['path']) && $model['path'][0] != $v['id']){	   
				  $cur_sel = ' class="parent"';	
			   }else{
				  $cur_sel = '';
			   }

			   $out .= $indent.'  <li'.$cur_sel.'><a href="'.$v['id'].'">'.$v['name_cat']."</a>\n";
			   $this->TreeRecursive($model, $v['id'], $lvl+1);
			}
			
	   $out .= $indent."</ul>\n";
	   return $out;
	}		  
		  
	  
	//конечная функция, которая выводит древовидное меню   
	public function TreeView($classModel, $selectID = 0) 
	{ 		  
		$model = $this->loadModel($classModel);
		$arr = $this->getDataID($model);

		return $this->TreeRecursive($this->TreeMergeArray($arr, $selectID ), 0, 0); 
	}		  
		  
		 
			
}