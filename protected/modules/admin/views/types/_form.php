<?php
/* @var $this TypesController */
/* @var $model Types */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'types-form',
	'enableAjaxValidation'=>false,
)); ?>

	<h3>Типы фильтров для категорий</h3>
	<div class="row">
		<label>Продам</label><input type="checkbox" name="Filters[s]" value="Продам" />
		<label>Куплю</label><input type="checkbox" name="Filters[p]" value="Куплю" />
		<label>Меняю</label><input type="checkbox" name="Filters[u]" value="Меняю" />
		<label>Сдам</label><input type="checkbox" name="Filters[o]" value="Сдам" />
		<label>Сниму</label><input type="checkbox" name="Filters[c]" value="Сниму" />
		<label>Предлагают</label><input type="checkbox" name="Filters[d]" value="Предлагают" />
		<label>Требуются</label><input type="checkbox" name="Filters[t]" value="Требуются" />
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->