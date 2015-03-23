<?php
/* @var $this BoardController */
/* @var $model Board */
$this->setPageTitle(Yii::app()->name.' - '.Yii::t('app', 'Create Board'));
$this->breadcrumbs=array(
	Yii::t('app', 'Create'),
);
?>
<div style="height: 11px;"></div>
<h2 class="underline"><?php echo Yii::t('app', 'Create Board');?></h2>
<p></p>

<?php if (Yii::app()->user->isGuest):?>
<div class="well">
Вы можете разместить объявление без регистрации. Но вы не сможете в дальнейшем управлять своими объявлениями.
Преимущества которые дает регистрация:
<ul>
<li>Вы получаете личный кабинет</li>
<li>Вам будут доступны такие функции как редактирование, удаление, обновление даты публикации вашего объявления</li>
<li>Вы сможете видеть количество просмотров ваших объявлений</li>
<li>И многое другое...</li>
</ul>
<?php echo CHtml::link(Yii::t('app', 'Регистрация'), Yii::app()->createUrl('/registration'), array('class'=>'btn btn-add'));?>
</div>
<?php endif;?>

<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'category'=>$category,
		'country'=>$country,
		'regions'=>$regions,
		'categorySelectData' => $categorySelectData,//Category::model()->getAllCategoriesForSelect(),
	)
); ?>