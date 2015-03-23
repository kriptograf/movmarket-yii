<h3>Горячие объявления</h3>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$vip,
	'itemView'=>'_view_vip_board',
)); ?>
<hr />