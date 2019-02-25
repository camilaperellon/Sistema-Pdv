<?php

/**
 * This is the model class for table "tbl_produto".
 *
 * The followings are the available columns in table 'tbl_produto':
 * @property integer $idproduto
 * @property integer $marca_id
 * @property integer $categoria_id
 * @property string $nome
 * @property string $descricao
 * @property double $preco
 *
 * The followings are the available model relations:
 * @property TblMarca $marca
 * @property TblCategoria $categoria
 * @property TblProdutovenda[] $tblProdutovendas
 */
class Produto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_produto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, preco', 'required'),
			array('marca_id, categoria_id', 'numerical', 'integerOnly'=>true),
			array('preco', 'numerical'),
			array('nome', 'length', 'max'=>100),
			array('descricao', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproduto, marca_id, categoria_id, nome, descricao, preco', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'marca' => array(self::BELONGS_TO, 'TblMarca', 'marca_id'),
			'categoria' => array(self::BELONGS_TO, 'TblCategoria', 'categoria_id'),
			'tblProdutovendas' => array(self::HAS_MANY, 'TblProdutovenda', 'produto_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproduto' => 'Idproduto',
			'marca_id' => 'Marca',
			'categoria_id' => 'Categoria',
			'nome' => 'Nome',
			'descricao' => 'Descricao',
			'preco' => 'Preco',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idproduto',$this->idproduto);
		$criteria->compare('marca_id',$this->marca_id);
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('preco',$this->preco);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Produto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
