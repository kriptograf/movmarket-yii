<div class="widget">
	<ul class="thumbnails">
	<?php foreach ($news as $item):?>
		<li class="span12 first">
			<div class="thumbnail">
				<h4 class="page-header"><?php echo CHtml::link($item->title, Yii::app()->createUrl('news/view', array('id'=>$item->id))); ?></h4>
				
				<p class="date"><?php echo date('d.m.Y', $item->date); ?></p>
			
				<p><?php echo CHtml::encode($item->short); ?></p>
				<br />
			
				
			</div>
		</li>
		<?php endforeach;?>
	</ul>
	
</div>