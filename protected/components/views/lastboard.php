<h2 class="page-header">Последние объявления</h2>

<div class="row-fluid">
	<?php foreach ($boards as $vip):?>
	<div class="hot list_properties">
			<div class="title_property2">
				<h2 class="span10 last"><?php echo CHtml::link(CHtml::encode($vip->title), array('/board/'.$vip->id)); ?></h2>
				<?php if(!Yii::app()->user->isGuest):?>
				<div class="favorite">
					<?php if($vip->favorite):?>
						<a href="<?php echo $vip->id;?>" title="Удалить из избранного" class="remove-favorite">
							<img alt="Удалить из закладок" src="/images/favorite.png" id="icon-<?php echo $vip->id;?>" />
						</a>
					<?php else:?>
						<a href="<?php echo $vip->id;?>" title="Добавить в избранное" class="link-favorite">
							<img alt="Добавить в закладки" src="/images/not-favorite.png" id="icon-<?php echo $vip->id;?>" />
						</a>
					<?php endif;?>
				</div>
				<?php endif;?>
			</div>
			<div class="row-fluid">
					<div class="list_img">
						<img src="/uploads/photos/thumb/<?php echo ($vip->photos[0]->thumb) ? $vip->photos[0]->thumb : 'nophoto.jpg';?>" alt="no-photo" width="70px" />
					</div>
					<div class="list_text span8">
						<?php echo Util::crop($vip->text,300); ?><br>
					</div>
					
					<div class="right">
						<span class="date-list"><?php echo date('d.m.Y H:i', $vip->date_add);?></span><br><br>
						<span class="price-list"><?php echo CHtml::encode($vip->price); ?> <?php echo $vip->currency;?></span>
					</div>
			</div>	
	</div>
	<?php endforeach;?>
	
	<script type="text/javascript">
		$(document).ready(function(){
			/*Добавляем в избранное*/
			$('.link-favorite').live('click',function(event){
				event.preventDefault();
				var id_board = $(this).attr('href');
				var add = $(this);
				$.post("/ajaxAddFavorite", { id_board: id_board},
					function(data){
						    if(data == 'success')
						    {
							    $('#icon-'+id_board).attr('src','/images/favorite.png');
							    $(add).addClass('remove-favorite').removeClass('link-favorite');
						    }
						    else if(data == 'fail')
						    {
							    alert('Не возможно добавить в избранное. Попробуйте через несколько минут.');
							    return false;
						    }
					});
			});
			/*Удаляем из избранного*/
			$('.remove-favorite').live('click',function(event){
				event.preventDefault();
				var id_board = $(this).attr('href');
				var remove = $(this);
				$.post("/ajaxAddFavorite/remove", { id_board: id_board},
					function(data){
						    if(data == 'success')
						    {
							    $('#icon-'+id_board).attr('src','/images/not-favorite.png');
							    $(remove).addClass('link-favorite').removeClass('remove-favorite');
						    }
						    else if(data == 'fail')
						    {
							    alert('Не возможно удалить из избранного. Причины: а)Вы пытаетесь удалить не то объявление которое добавляли. б)Сервер в данный момент перегружен, попробуйте позже.');
							    return false;
						    }
					});
			});
		});
	</script>
</div>
