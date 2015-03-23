<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	//'Profiles'=>array('index'),
	$model->username=>array('/profile'),
	'Избранные объявления',
);
?>
<div style="height: 20px;"></div>
<div class="thumbnails">
<h3>Избранные объявления</h3>
<?php if(isset($favorites)):?>
	<?php if(!$favorites):?>
		<p>У вас нет избранных объявлений.</p>
	<?php endif;?>
	<?php foreach ($favorites as $favorit):?>
		<div class="well">
			<div class="manage">
			<?php echo CHtml::link(CHtml::image('/images/delete.png','edit'),Yii::app()->createUrl('/profile/deleteFavorite/'.$favorit->id), array('title'=>'Удалить', 'class'=>'right'))?>
			</div>
      		<h4 class="underline"><?php echo CHtml::link($favorit->board->title, Yii::app()->createUrl('/profile/myboardDetail/'.$favorit->board->id));?></h4>
    		
    		<div class="row-fluid">
				<div class="list_img">
					<img alt="photo" src="/uploads/photos/thumb/<?php echo ($favorit->board->photos[0]->thumb) ? $favorit->board->photos[0]->thumb : 'nophoto.jpg';?>" width="70px" />
				</div>
				
				<div class="list_text span8">
					<?php echo CHtml::encode($favorit->board->text); ?><br>
				</div>
				
				<div class="right">
					<span class="date-list"><?php echo date('d.m.Y H:i', $favorit->board->date_add);?></span><br><br>
					<span class="price-list"><?php echo CHtml::encode($favorit->board->price); ?> <?php echo $favorit->board->currency;?></span>
				</div>
			</div>
			
    	</div>
	<?php endforeach;?>
	
<?php endif;?>
</div>