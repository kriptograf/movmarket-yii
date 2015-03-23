<?php echo CHtml::beginForm(array('search/result'), 'post', array('class'=> 'form-search'));?>
<div class="input-append well well-small">
  <input name="q" class="input-large" type="text" placeholder="Найти..." class="search-query" />
  <input class="btn append-btn" type="submit" value="Найти" />
</div>
<?php echo CHtml::endForm('');?>