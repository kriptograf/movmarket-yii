<?php
/* @var $this VipController */
/* @var $model Vip */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vip-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_board'); ?>
		<?php echo $form->textField($model,'id_board'); ?>
		<?php echo $form->error($model,'id_board'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kill_time'); ?>
		<?php echo $form->textField($model,'kill_time'); ?>
		<?php echo $form->error($model,'kill_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay'); ?>
		<?php echo $form->textField($model,'pay',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'pay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->