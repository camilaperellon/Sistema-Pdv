<?php
/* @var $this VendaController */
/* @var $model Venda */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
	$(document).ready(function(){

		var maximProdutos = 100;
		var campo = $('#Produtos');
		var botao = $('#adicionarProduto');

		var x = 1;

		$(botao).click(function(e){
			e.preventDefault();

			if(x<maximProdutos){

				x++;
				$(campo).clone().appeendTo();
			}
		})
	})
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productvenda-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<button class="row button" id="adicionarProduto">Adicionar Produto</button>

	<div class="row" id="Produtos">
		<?php 
		$produto = Produto::model()->findAll(array('order' => 'nome ASC'));
		$produto = CHtml::listData($produto, 'idproduto', 'nome');
		echo $form->dropDownList($model, 'produto_id', $produto,
			array(
				'empty' => 'Selecione'
			)
		);
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
