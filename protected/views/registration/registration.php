<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Регистрация',
);
?>
<div style="height: 12px;"></div>
<h2 class="underline">Регистрация</h2>
<p></p>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'profile'=>$profile)); ?>
