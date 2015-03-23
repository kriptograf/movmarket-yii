<?php
/* @var $this StatWmController */
/* @var $model StatWm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stat-wm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'purse'); ?>
		<?php echo $form->textField($model,'purse',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'purse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmid'); ?>
		<?php echo $form->textField($model,'wmid',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'wmid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'completed'); ?>
		<?php echo $form->textField($model,'completed',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_board'); ?>
		<?php echo $form->textField($model,'id_board'); ?>
		<?php echo $form->error($model,'id_board'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->