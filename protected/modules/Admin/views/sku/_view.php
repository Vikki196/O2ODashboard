<?php
/* @var $this SkuController */
/* @var $data Sku */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('depth')); ?>:</b>
	<?php echo CHtml::encode($data->depth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sequence')); ?>:</b>
	<?php echo CHtml::encode($data->sequence); ?>
	<br />


</div>