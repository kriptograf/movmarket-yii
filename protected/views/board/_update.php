<?php
/* @var $this BoardController */
/* @var $model Board */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'board-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'well',),
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with <span class="required">*</span> are required.')?></p>

	<?php //echo $form->errorSummary($model); ?>
	
	<?php //echo CVarDumper::dump($categorySelectData,10,true);?>
	<div class="rows">
		<?php echo $form->labelEx($model,'id_category'); ?>
		<?php echo $form->dropDownList($model,'id_category',$categorySelectData, array('prompt'=>Yii::t('app', '- Select category -'),
			'ajax' => array(
		            'type'=>'POST', //request type
		            'url'=>CController::createUrl('/ajaxTypes'), //url to call.
		            //Style: CController::createUrl('currentController/methodToCall')
		            'update'=>'#Board_type', //selector to update
		            'data'=>'js:"Board[type]="+this.value',
		            //leave out the data key to pass all form values through
		        ),
		)); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', Board::model()->getTypes($model->id_category)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'autor'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="rows">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>


	<div class="rows">
		<?php echo $form->labelEx($model,'contacts'); ?>
		<?php echo $form->textArea($model,'contacts',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contacts'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
	
	<div class="rows">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->dropDownList($model, 'currency', $model->getCurrencies());?>
		<?php echo $form->error($model,'currency'); ?>
	</div>
	
	<div class="rows">
		<?php 
			$this->widget('CMultiFileUpload', array(
                'name'      => 'images',
				'max'       => 5,
                'accept'    => 'jpeg|jpg|gif|png', // проверка типов файлов на клиенте
                'duplicate' => 'Дубликат изображения!', // Ошибка дубликат файла
                'denied'    => 'Запрещенный тип файла', // Ошибка не правильный тип файла
            ));
         ?>
		
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'video'); ?>
		<?php echo $form->textArea($model,'video',array('rows'=>6, 'cols'=>50, 'title'=>'Вствьте код видеоролика')); ?>
		<?php echo $form->error($model,'video'); ?>
	</div>

	<div class="rows">
		<?php //echo $form->labelEx($model,'tags'); ?>
		<?php //echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'tags'); ?>
	</div>


	<div class="rows buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Сохранить'), array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->