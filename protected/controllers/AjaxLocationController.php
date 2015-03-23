<?php
class AjaxLocationController extends Controller
{
	public function actionIndex()
	{
		//Установить куки регион
        $region_id = $_POST['Region'];
        
        //$cookie = Yii::app()->request->cookies['region']->value;
        
        //if($cookie)
        //{
        	//unset(Yii::app()->request->cookies['region']);
        //}
		
        //$expire = time()+60*60*24*180; 
        //Yii::app()->request->cookies['region'] = new CHttpCookie('region', $region_id, array('expire'=>$expire));
        
        
		//Получить решионы по идентификатору страны
        $data = City::model()->findAll('region_id=:region_id', array(':region_id'=>$_POST['Region']));

        echo CHtml::tag('option', array('value'=>''),CHtml::encode('- Выберите город -'),true);
        foreach($data as $city)
        {
           echo CHtml::tag('option', array('value'=>$city->city_id),CHtml::encode($city->name),true);
        }
        //echo '<script>window.location.reload(true);</script>';
        
	}
	public function actionApply()
	{
		//echo CVarDumper::dump($_POST,10,true);exit;
		
		if(isset($_POST['reset']))
		{
			
	        /**
	         * Если есть кука - регион,грохаем ее для установки новой
	         */
	        if($cookie_region = Yii::app()->request->cookies['region']->value)
	        {
	        	unset(Yii::app()->request->cookies['region']);
	        }
			
	        /**
	         * Если кука уже есть, удаляем ее 
	         */
	        if($cookie_city = Yii::app()->request->cookies['city']->value)
	        {
	        	unset(Yii::app()->request->cookies['city']);
	        }
	        
	        $this->redirect(Yii::app()->homeUrl);
	        
		}
		
		/**
		 * Получить идентификатор региона из пост массива
		 * @var integer
		 */
		$region_id = $_POST['Region'];
		/**
		 * Получить идентификатор города из пост массива
		 * @var integer
		 */
        $city_id = $_POST['City'];
        /**
         * Время жизни куки
         * @var integer
         */
        $expire = time()+60*60*24*180; 
        
        /**
         * если передан идентификатор региона
         */
        if($region_id)
        {
        	/**
	         * Получить значение куки - регион
	         * @var unknown_type
	         */
	        $cookie_region = Yii::app()->request->cookies['region']->value;
	        /**
	         * Если есть кука - регион,грохаем ее для установки новой
	         */
	        if($cookie_region)
	        {
	        	unset(Yii::app()->request->cookies['region']);
	        	if(!$city_id)
	        	{
		        	/**
			         * Получить значение куки города
			         * @var unknown_type
			         */
			        $cookie_city = Yii::app()->request->cookies['city']->value;
			        /**
			         * Если кука уже есть, удаляем ее 
			         */
			        if($cookie_city)
			        {
			        	unset(Yii::app()->request->cookies['city']);
			        }
	        	}
	        }
			/**
			 * Ставим новую куку - регион
			 */
	        Yii::app()->request->cookies['region'] = new CHttpCookie('region', $region_id, array('expire'=>$expire));       
        }
        /**
         * если передан город
         */
        if($city_id)
        {
        	/**
	         * Получить значение куки города
	         * @var unknown_type
	         */
	        $cookie_city = Yii::app()->request->cookies['city']->value;
	        /**
	         * Если кука уже есть, удаляем ее 
	         */
	        if($cookie_city)
	        {
	        	unset(Yii::app()->request->cookies['city']);
	        }
			/**
			 * Ставим новую куку города
			 */
	        Yii::app()->request->cookies['city'] = new CHttpCookie('city', $city_id, array('expire'=>$expire));
        
        }
        
        $this->redirect(Yii::app()->request->getUrlReferrer());
	}
}