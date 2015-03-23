<?php
$this->pageTitle=Yii::app()->name . ' - Наши контакты';
$this->breadcrumbs=array(
	'Контакты',
);
?>

<div style="height: 11px;"></div>
<h2 class="underline">Наши контакты</h2>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Если у вас есть бизнес-предложения или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами. Спасибо.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'well',
	),
)); ?>

	<p class="note">Поля со <span class="required">*</span> обязательны для заполнения.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="rows">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="rows">
		<?php echo $form->labelEx($model,'verifyCode'); ?>

		<?php $this->widget('CCaptcha', array(
			'buttonLabel'=>'<img src="/images/refresh.png" alt="Обновить изображение" />',
			'buttonOptions'=>array('title'=>'Обновить изображение'),
		)); 
		?>
		<br>
		<?php echo $form->textField($model,'verifyCode'); ?>

		<div class="hint">Пожалуйста, введите буквы, показанные на картинке.
		<br/>Буквы вводятся без учета регистра.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="rows buttons">
		<?php echo CHtml::submitButton('Отправить', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>