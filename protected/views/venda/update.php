<?php
/* @var $this VendaController */
/* @var $model Venda */

$this->breadcrumbs=array(
	'Vendas'=>array('index'),
	$model->idvenda=>array('view','id'=>$model->idvenda),
	'Update',
);

$this->menu=array(
	array('label'=>'List Venda', 'url'=>array('index')),
	array('label'=>'Create Venda', 'url'=>array('create')),
	array('label'=>'View Venda', 'url'=>array('view', 'id'=>$model->idvenda)),
	array('label'=>'Manage Venda', 'url'=>array('admin')),
);
?>

<h1>Update Venda <?php echo $model->idvenda; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>