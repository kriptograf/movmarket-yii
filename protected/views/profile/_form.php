<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'well',
	),
)); ?>



	<?php //echo $form->errorSummary($model); ?>

	<div class="rows">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'city_id'); ?><span class="hint">(Введите название города или выберите из списка)</span><br>
		<?php echo $form->dropDownList($model, 'city_id', CHtml::listData($cities, 'city_id', 'name'));?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>
	<script type="text/javascript">
	$(function() {
	    $( "#Profile_city_id" ).combobox();
	  });
	</script>

	<div class="rows buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->