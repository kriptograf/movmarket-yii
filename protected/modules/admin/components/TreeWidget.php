<?php
class TreeWidget extends CWidget
{
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$this->renderContent();
		parent::run();
	}
	public function renderContent()
	{
		$criteria = new CDbCriteria();
		$criteria->order='parent_id,id';
		$categories = Category::model()->findAll($criteria);
		
		// инициировать массив результатов
	    $links = array();

		$tree = array();
		
		$count = count($categories);
	    // перебор $categories
	    for($i=0;  $i<$count; $i++ )
	    {	
	    	if($categories[$i]->parent_id==0)
	    	{
	    		$tree[$i] = array($categories[$i]->id,$categories[$i]->name_cat); 
	    	}
	    	
	    	   
		    for($j=0; $j<$count; $j++)
		    {
			    if($categories[$i]->id == $categories[$j]->parent_id)
			    {
			    	$tree[$i][$j] = array($categories[$j]->id,$categories[$j]->name_cat);
		    	}
		    }
		    
	    }
	
	    echo CVarDumper::dump($tree,10,true);
			
	}
}