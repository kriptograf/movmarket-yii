<?php
/* @var $this BoardController */
/* @var $model Board */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'board-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
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
                        'class'=>'span12',
		)); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>
	
	
	<div class="rows">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array(),array('class'=>'span12',)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>60,'maxlength'=>255,'class'=>'span12',)); ?>
		<?php echo $form->error($model,'autor'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'span12',)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'span12',)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="rows">
		<?php echo $form->hiddenField($model, 'id_country', array('value'=>$country));?>
		<?php //echo $form->labelEx($model,'id_country'); ?>
		<?php /*echo $form->dropDownList($model,'id_country',CHtml::listData($country,'country_id','name'),
	        array(
	        	'empty'=>Yii::t('app', '- Select a country -'),
	            'ajax' => array(
		            'type'=>'POST', //request type
		            'url'=>CController::createUrl('ajaxRegion/index'), //url to call.
		            //Style: CController::createUrl('currentController/methodToCall')
		            'update'=>'#Board_id_region', //selector to update
		            'data'=>'js:"Board[id_country]="+this.value',
		            //leave out the data key to pass all form values through
		        ),
	        )
		); */?>
		<?php //echo $form->error($model,'id_country'); ?>
	</div>
	
	<div class="rows">
		<?php echo $form->labelEx($model,'id_region'); ?>
		<?php echo $form->dropDownList($model,'id_region', CHtml::listData($regions, 'region_id', 'name'),
	        array(
	        	'empty'=>Yii::t('app', '- Select region -'),
	            'ajax' => array(
		            'type'=>'POST', //request type
		            'url'=>CController::createUrl('ajaxCity/index'), //url to call.
		            //Style: CController::createUrl('currentController/methodToCall')
		            //'update'=>'#Board_id_city', //selector to update
		            'update'=>'#'.CHtml::activeId($model,'id_city'),
		            'data'=>'js:"Board[id_region]="+this.value',
		            //leave out the data key to pass all form values through
		        ),
                    'class'=>'span12',
	        )
		); ?>
		<?php echo $form->error($model,'id_region'); ?>
	</div>
	
	<div class="rows">
        <?php echo $form->labelEx($model,'id_city'); ?>
        <?php echo $form->dropDownList($model, 'id_city', array(), array('empty' => Yii::t('app', '- Select city -'),'class'=>'span12',)); ?>
        <?php echo $form->error($model,'id_city'); ?>
    </div>
	

	<div class="rows">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255,'class'=>'span12',)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>


	<div class="rows">
		<?php echo $form->labelEx($model,'contacts'); ?>
		<?php echo $form->textArea($model,'contacts',array('rows'=>6, 'cols'=>50,'class'=>'span12',)); ?>
		<?php echo $form->error($model,'contacts'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50,'class'=>'span12',)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
	
	<div class="rows">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php //echo $form->textField($model,'currency'); ?>
		<?php echo $form->dropDownList($model, 'currency', $model->getCurrencies());?>
		<?php echo $form->error($model,'currency'); ?>
	</div>
	
	<div class="rows">
		<?php 
			$this->widget('CMultiFileUpload', array(
                'name'      => 'images',
				'max'       => 5,
                'accept'    => 'jpeg|jpg|gif|png', // проверка типов фалов на клиенте
                'duplicate' => 'Дубликат изображения!', // Ошибка дубликат файла
                'denied'    => 'Запрещенный тип файла', // Ошибка не правильный тип файла
            ));
         ?>
		
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'video'); ?>
		<?php echo $form->textArea($model,'video',array('rows'=>6, 'cols'=>50, 'title'=>'Вствьте код видеоролика','class'=>'span12',)); ?>
		<?php echo $form->error($model,'video'); ?>
	</div>

	<div class="rows">
		<span id="gmap-spoiler">Указать место на карте</span><br><br>
                
                <div id="hide-map" <?php if($model->isNewRecord):?>style="height: 1px;overflow: hidden;"<?php else:?>style="height: auto;"<?php endif;?>>
                        <span class="hint">- Кликните на карте левой кнопкой мыши для установки маркера</span><br>
                        <span class="hint">- Передвигайте маркер в нужное вам место</span><br>
                        <span class="hint">- Покрутите колесико мыши для масштабирования карты</span><br>
                        <span class="hint">- Передвиньте маркер более точно в нужное место карты.</span><br><br>
                        <div id="gmap">
                            <?php $this->renderPartial('_adv_map_form'); ?>
                        </div>
                </div>
        

	</div>


	<div class="rows buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
        $('#gmap-spoiler').on('click',function(){
            $('#hide-map').css('height','auto');
        });
    });
</script>
