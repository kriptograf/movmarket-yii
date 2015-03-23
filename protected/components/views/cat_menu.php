<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 14.08.12
 * Time: 14:29
 * To change this template use File | Settings | File Templates.
 */
?>
<h2 class="page-header">Категории</h2>
<?php 
$this->widget('zii.widgets.CMenu',array(
				'id'=>'nav',
                'items'=>$categories,
                'htmlOptions'=>array(
                    'class'=>'nav nav-pills nav-stacked',
                ),
            )); 
?>
