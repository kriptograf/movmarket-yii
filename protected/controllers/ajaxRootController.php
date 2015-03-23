<?php
class AjaxRootController extends Controller
{
	public function actionIndex()
	{
		//Получить подкатегории по идентификатору категории
        $data = Category::model()->findAll('parent_id=:parent_id', array(':parent_id'=>$_POST['Board']['id_category']));

        echo CHtml::tag('option', array('value'=>''),CHtml::encode('- Выберите подкатегорию -'),true);
        foreach($data as $item)
        {
           echo CHtml::tag('option', array('value'=>$item->id),CHtml::encode($item->name_cat),true);
        }
	}
}