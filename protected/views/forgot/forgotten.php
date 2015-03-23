<?php
$this->pageTitle=Yii::app()->name . ' - Восстановление пароля';
$this->breadcrumbs=array(
	'Восстановление пароля',
);
?>
<div style="height: 11px;"></div>
<h2 class="underline">Восстановление пароля</h2>

<p></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgot-form',
	'enableClientValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'well',
	),
)); ?>

	<p class="note">Введите пожалуйста новый пароль и подтверждение пароля.</p>
	
	<div class="rows">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'verifyPassword'); ?>
		<?php echo $form->textField($model,'verifyPassword'); ?>
		<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	<div class="rows buttons">
		<?php echo CHtml::submitButton('Отправить', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
