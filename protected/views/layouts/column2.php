<?php $this->beginContent('//layouts/main'); ?>

<div class="span8">
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'separator'=>' &rarr; ',
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Главная',Yii::app()->homeUrl),
                'htmlOptions'=>array('class'=>'well well-small'),
        )); ?><!-- breadcrumbs -->
    <?php endif?>

    <?php echo $content; ?>
</div>


<!-- right sidebar -->
        <div class="span4">
        	<?php $this->widget('SearchBlockWidget',array());?>
        	<?php if (Yii::app()->controller->id != 'profile'):?>
	            <?php 
	            /**
	             * Виджет категорий. Вывод корневых категорий в макете
	             */
	            $this->widget('CategoryWidget', array('active_menu'=>$active_menu));
	            ?>
            <?php elseif (Yii::app()->controller->id == 'profile'):?>
            	<?php $this->widget('UserMenuWidget');?>
            <?php endif;?>
            <?php 
            /**
             * Виджет рекламных блоков
             */
            $this->widget('PromotionWidget');
            ?>
        </div>
        <!-- right sidebar -->

<?php $this->endContent(); ?>