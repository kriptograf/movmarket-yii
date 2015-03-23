<?php
/* @var $this ProfileController */
/* @var $model Board */
$sub = Category::model()->findByPk($model->id_category);//подкатегории
$parent = Category::model()->find('id = '.$sub->parent_id);//родительские категории
$this->breadcrumbs=array(
	'Мои объявления'=>array('/profile/myboard'),
	$model->title,
);
?>

<div style="height: 12px;"></div>
<h2 class="underline"><?php echo $model->title; ?></h2>

<h3 class="grey"><?php echo $model->idCategory->name_cat; ?></h3>

<div class="row-fluid">
	<div class="span8">
		<div class="date">
			<span class="label label-info"><?php echo date('d.m.Y H:i',$model->date_add);?></span>
		</div>
		<div class="price">
			<span class="label label-important">$ <?php echo $model->price;?></span>
		</div>	
		<div class="text"><?php echo $model->text;?></div>	
	</div>
	<div class="span4">
		<table class="table">
			<tr>
				<td>Автор:</td>
				<td><?php echo $model->autor;?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<div  class="spoiler-wrap">
					<div class="spoiler-head folded"><span>Показать</span></div>
					<div class="spoiler-body"><?php echo $model->email;?></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>Находится:</td>
				<td>
					<?php echo $model->country->name;?><br>
					<?php echo $model->region->name;?><br>
					<?php echo $model->city->name;?><br>
				</td>
			</tr>
			<tr>
				<td>Просмотров:</td>
				<td><?php echo $model->click;?></td>
			</tr>
			<tr>
				<td>Контакты:</td>
				<td>
				<div  class="spoiler-wrap">
					<div class="spoiler-head folded"><span>Показать</span></div>
					<div class="spoiler-body"><?php echo $model->contacts;?></div>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						// Закроем все спойлеры изначально
						jQuery('.spoiler-body').hide();
						// по клику отключаем класс closed, включаем open, затем для следующего
						// элемента после блока .spoiler-head (т.е. .spoiler-body) показываем текст спойлера
						jQuery('.spoiler-head').click(function(){
							jQuery(this).toggleClass("closed").toggleClass("open").next().toggle();
						});
					});
				</script>
				
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="gallery" class="well">
	<?php if(empty($model->photos)):?>
	<div class="hint">Изображения отсутствуют</div>
	<?php endif;?>
	<?php foreach ($model->photos as $photo):?>
		<a href="/uploads/photos/photo/<?php echo $photo->photo;?>" class="lightbox">
			<img src="/uploads/photos/thumb/<?php echo $photo->thumb;?>" />
		</a>
	<?php endforeach;?>
</div>

<div style="height:30px;"></div>
<?php //echo CHtml::link('Назад  к списку объявлений', Yii::app()->createUrl('/category/'.$parent->id.'/'.$sub->id), array('class'=>'btn'));?>
<?php echo CHtml::link('Назад  к избранным', $_SERVER['HTTP_REFERER'], array('class'=>'btn'));?>
<script type="text/javascript">
	$(function() {
        $('#gallery a').lightBox();
    });
</script>
