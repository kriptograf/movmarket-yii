<?php
$this->pageTitle=Yii::app()->name . ' - Ошибка '.$code;
$this->breadcrumbs=array(
	'Ошибка '.$code,
);
?>
<div style="height: 11px;"></div>
<h2 class="underline">Произошла ошибка <?php echo $code; ?></h2>
<div style="height: 11px;"></div>
<div class="error">
<p><?php echo CHtml::encode($message); ?></p>
<?php if($code == 404):?>
<img alt="404" src="/images/404.png" />
<?php elseif ($code == 403):?>
<img alt="403" src="/images/403.jpg" />
<?php elseif ($code == 400):?>
<img alt="400" src="/images/400.jpg" />
<?php endif;?>
</div>