<h2 class="page-header">Меню пользователя</h2>
<?php 
$this->widget('zii.widgets.CMenu',array(
				'id'=>'nav',
                'items'=>$menu,
                'htmlOptions'=>array(
                    'class'=>'nav nav-pills nav-stacked',
                ),
            )); 
?>