<?php
class AjaxAddFavoriteController extends Controller
{
	public function actionIndex()
	{
		if(!Yii::app()->request->isAjaxRequest)
		{
			return false;
		}
		if(Yii::app()->user->isGuest)
		{
			return false;
		}
		if($_POST)
		{
			$id_board = (int)$_POST['id_board'];
			$id_user = Yii::app()->user->id;
			
			$model = new Favorites();
			$model->board_id = $id_board;
			$model->user_id = $id_user;
			
			if($model->save())
			{
				echo 'success';
				Yii::app()->end();
			}
			else 
			{
				echo 'fail';
				Yii::app()->end();
			}
		}
	}
	public function actionRemove()
	{
		if(!Yii::app()->request->isAjaxRequest)
		{
			return false;
		}
		if(Yii::app()->user->isGuest)
		{
			return false;
		}
		if($_POST)
		{
			$id_board = (int)$_POST['id_board'];
			$id_user = Yii::app()->user->id;

			$criteria = new CDbCriteria();
			$criteria->compare('board_id', $id_board);
			$criteria->compare('user_id', $id_user);
			
			$model = Favorites::model()->find($criteria);
			
			if($model)
			{
				if($model->delete())
				{
					echo 'success';
					Yii::app()->end();
				}
			}
			else 
			{
				echo 'fail';
				Yii::app()->end();
			}
		}
	}
}