<?php
/* @var $this CompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'Create Company', 'url'=>array('create')),
	array('label'=>'Manage Company', 'url'=>array('admin')),
);
?>

<h1>Companies</h1>

<h2>Рубрикатор</h2>

<div>
    <div class="diff">
        <?php foreach ($category as $k=>$cat):?>
        <?php if($k==20):?>
        </div>
        <div class="diff">
        <?php endif;?>
            <p><a href="<?php echo Yii::app()->createUrl('/company/category/', array('id'=>$cat->id));?>"><?php echo $cat->title;?></a></p>
        <?php endforeach;?>
    </div>
</div>

