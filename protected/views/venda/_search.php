<?php
/* @var $this VendaController */
/* @var $model Venda */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idvenda'); ?>
		<?php echo $form->textField($model,'idvenda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cliente_id'); ?>
		<?php echo $form->textField($model,'cliente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vltotal'); ?>
		<?php echo $form->textField($model,'vltotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qtd'); ?>
		<?php echo $form->textField($model,'qtd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->