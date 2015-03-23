<?php
class AjaxRegionController extends Controller
{
	public function actionIndex()
	{
		//Получить решионы по идентификатору страны
        $data = Region::model()->findAll('country_id=:country_id', array(':country_id'=>$_POST['Board']['id_country']));

        echo CHtml::tag('option', array('value'=>''),CHtml::encode('- Выберите регион -'),true);
        foreach($data as $reg)
        {
           echo CHtml::tag('option', array('value'=>$reg->region_id),CHtml::encode($reg->name),true);
        }
	}
}