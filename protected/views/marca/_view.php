<?php
/* @var $this MarcaController */
/* @var $data Marca */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmarca')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmarca), array('view', 'id'=>$data->idmarca)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />


</div>