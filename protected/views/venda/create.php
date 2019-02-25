<?php
/* @var $this VendaController */
/* @var $model Venda */

$this->breadcrumbs=array(
	'Vendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Venda', 'url'=>array('index')),
	array('label'=>'Manage Venda', 'url'=>array('admin')),
);
?>

<h1>Create Venda</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'modelcesta'=>$modelcesta)); ?>