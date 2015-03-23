<h2 class="page-header">Горячие объявления</h2>

<div class="row-fluid">
	<?php foreach ($vips as $vip):?>
	<div class="hot list_properties">
			<div class="title_property2">
				<h2 class="vip"><?php echo CHtml::link(CHtml::encode($vip->title), array('/board/'.$vip->id)); ?></h2>
				<span class="star">VIP</span>
			</div>
			<div class="row-fluid">
					<div class="list_img">
						<img src="/uploads/photos/thumb/<?php echo ($vip->photos[0]->thumb) ? $vip->photos[0]->thumb : 'nophoto.jpg';?>" alt="no-photo"/>
					</div>
					<div class="list_text span7">
						<?php echo Util::crop($vip->text,300); ?><br>
						Цена: <strong>$ <?php echo CHtml::encode($vip->price); ?></strong><br />
					</div>
					
					<div class="span3">
						<b>Разместил:</b>
						<div class="board-author">
						<?php echo CHtml::encode($vip->autor); ?>
						</div>
						
						<div class="board-contact">
							<b>Контакты:</b><br>
							<?php echo CHtml::encode($vip->contacts); ?>
						</div>
					</div>
			</div>	
	</div>
	<?php endforeach;?>
</div>