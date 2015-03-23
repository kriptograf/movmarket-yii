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

	<p class="note">Введите пожалуйста адрес электронной почты, который вы вводили при регистрации.</p>

	<div class="rows">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="rows buttons">
		<?php echo CHtml::submitButton('Отправить', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
