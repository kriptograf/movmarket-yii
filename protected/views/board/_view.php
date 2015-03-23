<?php
/* @var $this BoardController */
/* @var $model Board */
?>

<div class="view">

	<?php 
		switch ($data->type)
		{
			case 's': echo 'Продам';
			break;
			case 'p': echo 'Куплю';
			break;
			case 'u': echo 'Меняю';
			break;
			case 'o': echo 'Сдам';
			break;
			case 'c': echo 'Сниму';
			break;
			default: echo 'Продам';
		}
	?>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<?php echo CHtml::encode($data->autor); ?>
	<br />


	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
 
	<?php echo CHtml::encode($data->city->name); ?>
	<br />

	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b>Просмотров:</b>
	<?php echo CHtml::encode($data->click); ?>
	<br />

	<b>Котактные данные:</b>
	<?php echo CHtml::encode($data->contacts); ?>
	<br />

	<b>
	<?php echo CHtml::encode($data->text); ?>
	</b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits')); ?>:</b>
	<?php echo CHtml::encode($data->hits); ?>
	<br />

	<b>Одобрено:</b>
	<?php echo CHtml::encode($data->checked); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />


	<b>Размещено:</b>
	<?php echo date('d.m.Y H:i', $data->date_add); ?>
	<br />


</div>