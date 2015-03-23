<?php
class AjaxCityController extends Controller
{
	public function actionIndex()
	{
		//Получить решионы по идентификатору страны
        $data = City::model()->findAll('region_id=:region_id', array(':region_id'=>$_POST['Board']['id_region']));

        echo CHtml::tag('option', array('value'=>''),CHtml::encode('- Выберите город -'),true);
        foreach($data as $city)
        {
           echo CHtml::tag('option', array('value'=>$city->city_id),CHtml::encode($city->name),true);
        }
	}
}