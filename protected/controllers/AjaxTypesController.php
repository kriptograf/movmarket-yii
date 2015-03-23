<?php
class AjaxTypesController extends Controller
{
	/**
	 * Формируем выпадающий список для выбора типа объявления
	 */
	public function actionIndex()
	{
		if(!Yii::app()->request->isAjaxRequest)
		{
			return false;
			Yii::app()->end();
		}

		$cat = Category::model()->findByPk(intval($_POST['Board']['type']));
		
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
		
		echo CHtml::tag('option', array('value'=>'p'),CHtml::encode('- Выберите тип объявления -'),true);
		foreach($data as $k => $v)
        {
           echo CHtml::tag('option', array('value'=>$k),CHtml::encode($v),true);
        }
	}
}