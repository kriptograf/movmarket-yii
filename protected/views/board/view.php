<?php
/* @var $this BoardController */
/* @var $model Board */
$sub = Category::model()->findByPk($model->id_category);//подкатегории
$parent = Category::model()->find('id = '.$sub->parent_id);//родительские категории
$this->breadcrumbs=array(
	$parent->name_cat=>array('/category/'.$parent->id),
	$sub->name_cat=>array('/category/'.$parent->id.'/'.$sub->id),
	$model->title,
);
?>

<div style="height: 12px;"></div>
<h2 class="underline"><?php echo $model->title; ?></h2>

<h3 class="grey"><?php echo $model->idCategory->name_cat; ?></h3>

<div class="row-fluid">
	<div class="span8">
		<div class="date">
			<span class="label label-info"><?php echo date('d.m.Y H:i',$model->date_add);?></span>
		</div>
		<div class="price">
			<span class="label label-important"><?php echo $model->price;?> <?php echo $model->currency;?></span>
		</div>	
		<div class="text"><?php echo $model->text;?></div>	
	</div>
	<div class="span4">
		<table class="table">
			<tr>
				<td>Автор:</td>
				<td><?php echo $model->autor;?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<div  class="spoiler-wrap">
					<div class="spoiler-email folded"><span>Показать</span></div>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							// Закроем все спойлеры изначально
							jQuery('.spoiler-body-email').hide();
							// по клику отключаем класс closed, включаем open, затем для следующего
							// элемента после блока .spoiler-head (т.е. .spoiler-body) показываем текст спойлера
							jQuery('.spoiler-email').click(function(){
								jQuery('.spoiler-body-email').toggle();
							});
						});
					</script>
					</div>
				</td>
			</tr>
			<tr class="spoiler-body-email">
				<td colspan="2">
					<div class="spoiler-body-email">
					<?php if(!$model->email):?>
						Email не указан
					<?php else:?>
						<?php echo $model->email;?>
					<?php endif;?>
					</div>
					
				</td>
			</tr>
			<tr>
				<td>Находится:</td>
				<td>
					<?php echo $model->country->name;?><br>
					<?php echo $model->region->name;?><br>
					<?php echo $model->city->name;?><br>
				</td>
			</tr>
			<tr>
				<td>Просмотров:</td>
				<td><?php echo $model->click;?></td>
			</tr>
			<tr>
				<td>Контакты:</td>
				<td>
				<div  class="spoiler-wrap">
					<div class="spoiler-head folded"><span>Показать</span></div>
					
				</div>
				
				
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="spoiler-body">
					<p><?php echo $model->contacts;?></p>
					</div>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							// Закроем все спойлеры изначально
							jQuery('.spoiler-body').hide();
							// по клику отключаем класс closed, включаем open, затем для следующего
							// элемента после блока .spoiler-head (т.е. .spoiler-body) показываем текст спойлера
							jQuery('.spoiler-head').click(function(){
								jQuery('.spoiler-body').toggle();
							});
						});
					</script>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="gallery" class="well">
	<?php if(empty($model->photos)):?>
	<div class="hint">Изображения отсутствуют</div>
	<?php endif;?>
	<?php foreach ($model->photos as $photo):?>
		<a href="/uploads/photos/photo/<?php echo $photo->photo;?>" class="lightbox">
			<img src="/uploads/photos/thumb/<?php echo $photo->thumb;?>" />
		</a>
	<?php endforeach;?>
</div>

<?php if($location):?>
<span id="gmap-spoiler">Посмотреть на карте</span><br>
<div id="hide-map" style="height: 1px;overflow: hidden;">
    <div class="map-view">
        <?php
        Yii::import('ext.EGMap.*');

        $gMap = new EGMap();
        $gMap->zoomControlOptions = array(
            'position'=>EGMapControlPosition::BOTTOM_LEFT,
            'style'=>EGMap::ZOOMCONTROL_STYLE_SMALL
        );
        $gMap->setJsName('test_map');
        $gMap->width = '650';
        $gMap->height = '450';
        $gMap->zoom = $location->map_zoom_level;
        $gMap->setCenter($location->latitude, $location->longitude);

        $info_box = new EGMapInfoBox('<div style="color:#fff;border: 1px solid black; margin-top: 8px; background: #000; padding: 5px;">'.$model->title.'</div>');

        // set the properties
        $info_box->pixelOffset = new EGMapSize('0','-140');
        $info_box->maxWidth = 0;
        $info_box->boxStyle = array(
            'width'=>'"280px"',
            'height'=>'"120px"',
            'background'=>'"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
        );
        $info_box->closeBoxMargin = '"10px 2px 2px 2px"';
        $info_box->infoBoxClearance = new EGMapSize(1,1);
        $info_box->enableEventPropagation ='"floatPane"';

        // Create marker
        $marker = new EGMapMarker($location->latitude, $location->longitude, array('title' => 'Мы находимся здесь'));

        $marker->addHtmlInfoBox($info_box);


        $gMap->addMarker($marker);

        $gMap->renderMap();
        ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#gmap-spoiler').on('click',function(){
            $('#hide-map').css('height','auto');
        });
    });
</script>
<?php endif;?>

<div style="height:30px;"></div>
<?php //echo CHtml::link('Назад  к списку объявлений', Yii::app()->createUrl('/category/'.$parent->id.'/'.$sub->id), array('class'=>'btn'));?>
<?php echo CHtml::link('На предыдущую страницу', $_SERVER['HTTP_REFERER'], array('class'=>'btn'));?>
<script type="text/javascript">
	$(function() {
        $('#gallery a').lightBox();
    });
</script>
