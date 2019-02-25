<?php
/* @var $this VendaController */
/* @var $data Venda */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idvenda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idvenda), array('view', 'id'=>$data->idvenda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vltotal')); ?>:</b>
	<?php echo CHtml::encode($data->vltotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtd')); ?>:</b>
	<?php echo CHtml::encode($data->qtd); ?>
	<br />


</div>