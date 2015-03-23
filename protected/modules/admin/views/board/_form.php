<?php
/* @var $this BoardController */
/* @var $model Board */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'board-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_category'); ?>
		<?php echo $form->textField($model,'id_category'); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
		<?php echo $form->error($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'click'); ?>
		<?php echo $form->textField($model,'click'); ?>
		<?php echo $form->error($model,'click'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contacts'); ?>
		<?php echo $form->textArea($model,'contacts',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contacts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video'); ?>
		<?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
		<?php echo $form->error($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked'); ?>
		<?php echo $form->textField($model,'checked',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'checked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_time'); ?>
		<?php echo $form->textField($model,'top_time'); ?>
		<?php echo $form->error($model,'top_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_delete'); ?>
		<?php echo $form->textField($model,'time_delete'); ?>
		<?php echo $form->error($model,'time_delete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Вип'); ?>
		<?php echo $form->checkBox($model,'vip'); ?>
		<?php echo $form->error($model,'vip'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Выделить цветом'); ?>
		<?php echo $form->checkBox($model,'highlight'); ?>
		<?php echo $form->error($model,'highlight'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->