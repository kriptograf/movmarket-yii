<?php
/* @var $this CategoryController */
/* @var $model Category */
$parent = Category::model()->find('id='.$model->parent_id);
if($parent)
{
	$this->breadcrumbs=array(
		$parent->name_cat=>array($parent->id),
		$model->name_cat,
	);
}
else 
{
	$this->breadcrumbs=array(
		$model->name_cat,
	);
}

?>
<!-- <div class="well"> -->
	<!-- <img src="<?php //echo $model->img;?>" alt="<?php //echo $model->name_cat;?>" /> -->
	<!--  <i class="icon-hand-up"></i>
	<h1 class="head-category">
		<?php //echo $model->name_cat; ?>
	</h1>
</div>-->

<p><?php echo $model->description;?></p>

<?php if($sub_cat):?>
	<div class="subcategories thumbnail">
		<ul class="nav nav-pills">
			<?php foreach ($sub_cat as $cat):?>
				<li <?php echo ($cat->id == Yii::app()->request->getParam('id')) ? 'class="active"' : 'class="inactive"';?>>
					<?php echo CHtml::link($cat->name_cat, Yii::app()->createUrl('/category/'.$cat->parent_id.'/'.$cat->id));?>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
	<p></p>
<?php endif;?>

<!-- Фильтры для категории объявлений -->
<?php if($model->types->filter != '0'):?>
<?php $types = unserialize($model->types->filter);?>
<ul class="nav nav-tabs">
	<?php foreach ($types as $k => $v):?>
	<li><a href="<?php echo Yii::app()->request->getRequestUri();?>" id="<?php echo $k;?>"><?php echo $v;?></a></li>
	<?php endforeach;?>
</ul>
<?php endif;?>
<!-- Фильтры для категории объявлений -->

<?php if($vip && $vip->data):?>
	<h3>Горячие объявления</h3>
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$vip,
		'itemView'=>'_view',
	)); ?>
	<hr>
<?php endif;?>

<?php 
$this->widget('zii.widgets.CListView', array(
	'id'=>'list_cat',
	'dataProvider'=>$boards,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'price',
    ),
    'sorterHeader' => 'Сортировать по: ',
    'summaryText'=>'Объявления {start}&mdash;{end} из {count}',
    'ajaxUpdate'=>false,
    'pagerCssClass'=>'pagination',
    'pager'=>array(
        'header' => '',
    	'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
        'lastPageLabel'=>'>>',
    	'selectedPageCssClass'=>'active',
    	'cssFile'=>false,
    ),
)); 
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#s').click(function(){
		$.cookie('type', 's', { expires: 7 }); //установить куки с временем жизни 7 дней 
	});
	$('#p').click(function(){
		$.cookie('type', 'p', { expires: 7 }); //установить куки с временем жизни 7 дней 
	});
	$('#u').click(function(){
		$.cookie('type', 'u', { expires: 7 }); //установить куки с временем жизни 7 дней 
	});
	$('#o').click(function(){
		$.cookie('type', 'o', { expires: 7 }); //установить куки с временем жизни 7 дней 
	});
	$('#c').click(function(){
		$.cookie('type', 'c', { expires: 7 }); //установить куки с временем жизни 7 дней 
	});
	
	switch('<?php echo $active;?>')
	{
	case 's':
		$('#s').closest('li').addClass('active');
		break;
	case 'p':
		$('#p').closest('li').addClass('active');
		break;
	case 'u':
		$('#u').closest('li').addClass('active');
		break;
	case 'o':
		$('#o').closest('li').addClass('active');
		break;
	case 'c':
		$('#c').closest('li').addClass('active');
		break;
	}
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
