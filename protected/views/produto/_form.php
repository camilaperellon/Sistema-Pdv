<?php
/* @var $this ProdutoController */
/* @var $model Produto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row marca_id">
		<?php echo $form->labelEx($model,'marca_id'); ?>
		<?php  $marca = Marca::model()->findAll(array('order' => 'nome ASC'));
		$marca = CHtml::listData($marca,  'idmarca', 'nome');
		echo $form->dropDownList($model, 'marca_id', $marca,
			array(
				'empty' => 'Selecione'
			)
		);?>
		<?php echo $form->error($model,'marca_id'); ?>
	</div>

	<div class="row categoria_id">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php  $categoria = Categoria::model()->findAll(array('order' => 'nome ASC')); //pegando todos os valores da classe Categoria
		$categoria = CHtml::listData($categoria, 'idcategoria', 'nome'); //lendo a lista $categoria e colocando como chave o id e o valor o nome
		echo $form->dropDownList($model, 'categoria_id', $categoria,
			array(
				'empty' => 'Selecione'
			)
		);?>
		<?php echo $form->error($model,'categoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preco'); ?>
		<?php echo $form->textField($model,'preco'); ?>
		<?php echo $form->error($model,'preco'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->