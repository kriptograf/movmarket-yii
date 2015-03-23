<?php
	$this->pageTitle='Результаты поиска -' .Yii::app()->name;
	$this->breadcrumbs=array(
	    'Результаты поиска по запросу: '. CHtml::encode($term),
	);
	?>
	 
	<p class="lead well">Результаты поиска по запросу: "<?php echo CHtml::encode($term); ?>"</p>
	<?php if (!empty($results)): ?>
	      <?php foreach($results as $result): ?>
		      <div class="view list_properties">
		
				<div class="title_property2">                  
		            <h2 class="span12 item-title"><?php echo CHtml::link($result->title, array('/board/'.$result->id)); ?></h2>
		            <div class="right">
						<span class="label label-info"><?php echo date('d.m.Y H:i', $result->date_add);?></span>
						<span class="label label-important"><?php echo CHtml::encode($result->price); ?> <?php echo CHtml::decode($result->currency);?></span>
					</div>
		        </div>
		        <div class="row-fluid">
		        	<div class="list_img">
						<img alt="photo" src="/uploads/photos/thumb/<?php echo ($result->photos[0]->thumb)?$result->photos[0]->thumb:'nophoto.jpg';?>" width="70px" />
					</div>
		        	<div class="list_text span10">
                                    <p><?php echo Util::crop($result->text,300); ?></p>
		            </div>
		        </div>
		      </div>
	      <?php endforeach; ?>
	 
	 <?php else: ?>
	        <p class="error">Поиск не дал результатов.</p>
	 <?php endif; ?>
	 