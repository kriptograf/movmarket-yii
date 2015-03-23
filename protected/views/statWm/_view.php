<?php
/* @var $this StatWmController */
/* @var $model StatWm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purse')); ?>:</b>
	<?php echo CHtml::encode($data->purse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmid')); ?>:</b>
	<?php echo CHtml::encode($data->wmid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed')); ?>:</b>
	<?php echo CHtml::encode($data->completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_board')); ?>:</b>
	<?php echo CHtml::encode($data->id_board); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>