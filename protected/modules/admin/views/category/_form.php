<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>
<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
			<h2>Редактирование категории - <?php echo $model->name_cat;?></h2>
		</div>
		<div class="box-wrap clear">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'category-form',
			'enableAjaxValidation'=>false,
		)); ?>
		
			<p class="note">Fields with <span class="required">*</span> are required.</p>
			
			<div class="columns clear bt-space15">
				<div class="col2-3">
					<?php echo $form->errorSummary($model); ?>

					<div class="form-field clear">
						<?php echo $form->labelEx($model,'parent_id',array('class'=>'form-label size-120 fl-space2')); ?>
						<?php echo $form->dropDownList($model, 'parent_id', CHtml::listData($categories, 'id', 'name_cat'),  array('prompt'=>'--Корневая категория--'));?>
						<?php echo $form->error($model,'parent_id'); ?>
					</div>
				
					<div class="form-field clear">
						<?php echo $form->labelEx($model,'name_cat',array('class'=>'form-label size-120 fl-space2')); ?>
						<?php echo $form->textField($model,'name_cat',array('size'=>60,'maxlength'=>255)); ?>
						<?php echo $form->error($model,'name_cat'); ?>
					</div>
				
					<div class="form-field clear">
						<?php echo $form->labelEx($model,'description',array('class'=>'form-label size-120 fl-space2')); ?>
						<?php echo $form->textArea($model,'description'); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>
					
					<div class="form-field clear">
						<?php echo $form->labelEx($model,'type_filters',array('class'=>'form-label size-120 fl-space2')); ?>
						<?php echo $form->dropDownList($model, 'type_filters', CHtml::listData(Types::model()->findAll() , 'id', 'description'), array('empty'=>'Выбрать фильтр для категории'));?>
						<?php echo $form->error($model,'type_filters'); ?>
					</div>
				
					<div class="form-field clear">
						<?php echo $form->labelEx($model,'img',array('class'=>'form-label size-120 fl-space2')); ?>
						<?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
						<?php echo $form->error($model,'img'); ?>
					</div>
				
					<div class="form-field clear">
						<?php echo $form->labelEx($model,'sort_index',array('class'=>'form-label size-120 fl-space2')); ?>
						<?php echo $form->textField($model,'sort_index'); ?>
						<?php echo $form->error($model,'sort_index'); ?>
					</div>
				
					<div class="form-field clear">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить',array('class'=>'button blue size-150 fr')); ?>
					</div>
				</div>
				<div class="col1-3 lastcol">
					<div class="mark_blue bt-space20">
						<h4>Действия:</h4>
						<?php 
							$this->widget('zii.widgets.CMenu',array(
								'items'=>array(
									array('label'=>'Список категорий', 'url'=>array('index')),
									array('label'=>'Добавить категорию', 'url'=>array('create')),
									array('label'=>'Просмотр категории', 'url'=>array('view', 'id'=>$model->id)),
									array('label'=>'Управление категориями', 'url'=>array('admin')),
								),
								'htmlOptions'=>array('class'=>'clear'),
							)); 
						?>
						<p></p>		
					</div> 
				</div>
			</div>
		
		<?php $this->endWidget(); ?>
		
		</div><!-- form -->
	</div>
</div>
