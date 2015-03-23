<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'well',
	),
)); ?>

	<p class="note"> <span class="required">*</span> отмечены обязательные поля.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="rows">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($profile,'username'); ?>
		<?php echo $form->textField($profile,'username'); ?>
		<?php echo $form->error($profile,'username'); ?>
	</div>

	<div class="rows buttons">
		<?php echo CHtml::submitButton('Регистрация', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->