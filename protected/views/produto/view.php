<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->breadcrumbs=array(
	'Produtos'=>array('index'),
	$model->idproduto,
);

$this->menu=array(
	array('label'=>'List Produto', 'url'=>array('index')),
	array('label'=>'Create Produto', 'url'=>array('create')),
	array('label'=>'Update Produto', 'url'=>array('update', 'id'=>$model->idproduto)),
	array('label'=>'Delete Produto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idproduto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Produto', 'url'=>array('admin')),
);
?>

<h1>View Produto #<?php echo $model->idproduto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idproduto',
		'marca_id',
		'categoria_id',
		'nome',
		'descricao',
		'preco',
	),
)); ?>
