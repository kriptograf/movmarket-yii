<?php
/* @var $this SubscribeController */
/* @var $model Subscribe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail')); ?>:</b>
	<?php echo CHtml::encode($data->mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_board')); ?>:</b>
	<?php echo CHtml::encode($data->id_board); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cat')); ?>:</b>
	<?php echo CHtml::encode($data->id_cat); ?>
	<br />


</div>