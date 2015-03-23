<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_photo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_photo), array('view', 'id'=>$data->id_photo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_board')); ?>:</b>
	<?php echo CHtml::encode($data->id_board); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumb')); ?>:</b>
	<?php echo CHtml::encode($data->thumb); ?>
	<br />


</div>