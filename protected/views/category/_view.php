<?php
/* @var $this CategoryController */
/* @var $model Category */
?>

<div class="view list_properties <?php echo ($data->highlight)?'highlight':'';?> <?php echo ($data->vip)?'vip':'';?>">
	<div class="title_property2">
		<h2 class="span10 item-title"><?php echo CHtml::link(CHtml::encode($data->title), array('/board/view', 'id'=>$data->id)); ?></h2>
		<?php if(!Yii::app()->user->isGuest):?>
		<div class="favorite">
			<?php if($data->favorite):?>
				<a href="<?php echo $data->id;?>" title="Удалить из избранного" class="remove-favorite">
					<img alt="Удалить из закладок" src="/images/favorite.png" id="icon-<?php echo $data->id;?>" />
				</a>
			<?php else:?>
				<a href="<?php echo $data->id;?>" title="Добавить в избранное" class="link-favorite">
					<img alt="Добавить в закладки" src="/images/not-favorite.png" id="icon-<?php echo $data->id;?>" />
				</a>
			<?php endif;?>
		</div>
		<?php endif;?>
	</div>
	
	<div class="row-fluid">
		<div class="list_img">
			<img alt="photo" src="/uploads/photos/thumb/<?php echo ($data->photos[0]->thumb) ? $data->photos[0]->thumb : 'nophoto.jpg';?>" width="70px" />
		</div>
		
		<div class="list_text span8">
			<?php echo CHtml::encode($data->text); ?><br>
		</div>
		
		<div class="right">
			<span class="date-list"><?php echo date('d.m.Y H:i', $data->date_add);?></span><br><br>
			<span class="price-list"><?php echo CHtml::encode($data->price); ?> <?php echo $data->currency;?></span>
		</div>
	</div>


</div>