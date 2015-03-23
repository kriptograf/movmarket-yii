<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	//'Profiles'=>array('index'),
	$model->username=>array('/profile'),
	'Мои объявления',
);
?>
<div style="height: 20px;"></div>
<div class="thumbnails">
<?php if(isset($myboards)):?>
	<?php foreach ($myboards as $board):?>
		<div class="well">
			<div class="manage">
			<?php echo CHtml::link(CHtml::image('/images/edit.png','edit'),Yii::app()->createUrl('/board/edit/'.$board->id), array('title'=>'Редактировать', 'class'=>'right'))?>
			<?php echo CHtml::link(CHtml::image('/images/delete.png','edit'),Yii::app()->createUrl('/board/delete/'.$board->id), array('title'=>'Удалить', 'class'=>'right'))?>
			<?php echo CHtml::link(CHtml::image('/images/extend.png','edit'),Yii::app()->createUrl('/board/extend/'.$board->id), array('title'=>'Продлить', 'class'=>'right'))?>
			</div>
      		<h4 class="underline"><?php echo CHtml::link($board->title, '/profile/myboardDetail/'.$board->id);?></h4>
    		<span class="badge badge-info"><b>Просмотров:</b> <span class="badge badge-warning"><?php echo $board->click;?></span></span>
    		<span class="badge badge-info"><b>Проверено:</b> <span class="badge badge-warning"><?php echo ($board->checked=='no')?'Нет':'Да';?></span></span>
    		<span class="badge badge-info"><b>VIP:</b> <span class="badge badge-warning"><?php echo ($board->vip==0)?'Нет':'Да';?></span></span>
    		<span class="badge badge-info"><b>Выделено:</b> <span class="badge badge-warning"><?php echo ($board->highlight==0)?'Нет':'Да';?></span></span>
    		<span class="badge badge-info"><b>Прошло:</b> <span class="badge badge-warning"><?php $m=time() - $board->date_add; $s = $m/3600; $t = $s/24; echo intval($t);?></span> дней</span>
    	</div>
	<?php endforeach;?>
<?php endif;?>
</div>