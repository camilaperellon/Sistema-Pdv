<?php
/* @var $this VendaController */
/* @var $model Venda */
/* @var $form CActiveForm */
?>
<script
			  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous">
			  	
</script>

<script type="text/javascript">
	$(document).ready(function(){

		var campo = $('.produtoClone:first');
		var botaoAdicionar = $('#adicionarProduto');
		var area = $('#Produtos');
		var x = 0;
		var vlTotal = $('#Venda_vltotal');
		
		$(botaoAdicionar).click(function(e){
			e.preventDefault();

			var newbloco = campo.clone();

			novoselect = newbloco.find("select");
			novoinput = newbloco.find("input");

			countSelect = $('.produtoClone').length;

			countInput = novoinput.length;

			novoselect.attr('id', "Produtovenda_"+countSelect+"_produto_id");
			novoselect.attr('name', "Produtovenda["+countSelect+"][produto_id]");

			novoinput.attr('id', "Produtovenda_"+countInput+"_qtd");
			novoinput.attr('name', "Produtovenda["+countInput+"][qtd]");

			newbloco.appendTo(area);



		})
	})

	function total(){

		var valorTotal = 0;
		var qtdTotal = 0;

		$(".produtoClone").each(function(){

			var preco = $(this).find("select option:selected").data("valor");

			var qtd = parseInt($(this).find("input").val());

			valorTotal += preco * qtd;

			qtdTotal += qtd;

		})

		$("#Venda_vltotal").val(valorTotal);
		$("#Venda_qtd").val(qtdTotal);

		}

	$(document).on("change", ":input", function(){

		total();
	})
		
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venda-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cliente_id'); ?>
		<?php  $cliente = Cliente::model()->findAll(array('order' => 'nome ASC'));
		$cliente = CHtml::listData($cliente, 'idcliente', 'nome');
		echo $form->dropDownList($model, 'cliente_id', $cliente,
			array(
				'empty' => 'Selecione'
			)
		);
	?>
	
	<?php echo $form->error($model,'cliente_id'); ?>
	
	</div>

	<button type="button" class="row button" id="adicionarProduto">Adicionar Produto</button>

	<div class="row" id="Produtos">
		<?php

			$produto = Produto::model()->findAll();
			$listOptions = [];
			foreach ($produto as $produtos) {
							 
				$listOptions[$produtos->idproduto] = ['data-valor'=>$produtos->preco];
			}

			$produto = CHtml::listData($produto, 'idproduto', 'nome');

			if (isset($_POST['Produtovenda'])){

				foreach ($_POST['Produtovenda'] as $i => $produtonopost) {
			?> 
				<div class="produtoClone">
					<?php
						$modelcesta = new Produtovenda;

						$modelcesta->produto_id = $produtonopost['produto_id'];
						$modelcesta->qtd = $produtonopost['qtd'];
						


						echo $form->dropDownList($modelcesta, '['.$i.']produto_id', $produto,
							array(
								'empty' => 'Selecione',
								'options'=>$listOptions
							)
						);
						
						echo $form->labelEx($modelcesta,'qtd');
						echo $form->textField($modelcesta,'['.$i.']qtd');
						echo $form->error($modelcesta,'qtd');
					?>
				</div>
		<?php
				}

				$modelcesta = new Produtovenda;
			}?>
			<div class="produtoClone"> <?php

				echo $form->dropDownList($modelcesta, '[0]produto_id', $produto,
					array(
						'empty' => 'Selecione',
						'options' => $listOptions
					)
				);

				echo $form->labelEx($modelcesta,'qtd');
				echo $form->textField($modelcesta,'[0]qtd');
				echo $form->error($modelcesta,'qtd');
				?></div>
	</div>
	<?php
		echo $form->labelEx($model,'vltotal');
		echo $form->textField($model,'vltotal');
		echo $form->error($model,'vltotal');
	
	?>

	<?php
		echo $form->labelEx($model,'qtd');
		echo $form->textField($model,'qtd');
		echo $form->error($model,'qtd');
	
	?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --