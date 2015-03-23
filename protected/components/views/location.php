<div class="navs-loc">
	<ul class="loc">
		<li id="location">
			<a id="loc-trigger" href="#"> 
				<?php if($region):?>
					<?php echo $region;?>
					<?php if($city):?>
					<?php echo ', '.$city;?>
					<?php endif;?>
				<?php else:?>
				Вся Украина 
				<?php endif;?>
				<span>&#9660;</span>
			</a>
			<div id="loc-content">
				<form method="post" action="<?php echo Yii::app()->createUrl('/ajaxLocation/apply')?>" name="login_form" id="login_form">
					<fieldset id="inputs">
						<?php echo CHtml::dropDownList('Region', (Yii::app()->request->cookies['region']->value)?Yii::app()->request->cookies['region']->value:'', CHtml::listData($model, 'region_id', 'name'), array(
						'empty'=>'--Выберите регион--',
						'ajax' => array(
							            'type'=>'POST', //request type
							            'url'=>Yii::app()->createUrl('ajaxLocation/index'), //url to call.
							            //Style: CController::createUrl('currentController/methodToCall')
							            'update'=>'#City', //selector to update
							            'data'=>'js:"Region="+this.value',
							            //leave out the data key to pass all form values through
							        ),
						));?>
						<?php echo CHtml::dropDownList('City', (Yii::app()->request->cookies['city']->value)?Yii::app()->request->cookies['city']->value:'', CHtml::listData($cities, 'city_id', 'name'), array('empty'=>'--Выберите город--',));?>
					</fieldset>
					<fieldset id="actions">
						<input type="submit" class="btn btn-success" value="Сохранить фильтр" /> 
						<input type="submit" class="btn btn-danger" name="reset" value="Сбросить фильтр" /> 
					</fieldset>
				</form>
			</div>
		</li>
	</ul>
	<!-- Выпадающая форма логина -->
</div>