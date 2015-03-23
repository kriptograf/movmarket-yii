<?php
$this->pageTitle=Yii::app()->name . ' - Вход в систему';
$this->breadcrumbs=array(
	'Вход в систему',
);
?>
<div style="height: 11px;"></div>
<h2 class="underline">Вход в систему</h2>

<p></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'well',
	),
)); ?>

	<p class="note">Поля со <span class="required">*</span> обязательны для заполнения.</p>

	<div class="rows">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rows rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="rows buttons">
		<?php echo CHtml::submitButton('Вход', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
