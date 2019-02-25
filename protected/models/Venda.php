<?php

/**
 * This is the model class for table "tbl_venda".
 *
 * The followings are the available columns in table 'tbl_venda':
 * @property integer $idvenda
 * @property integer $cliente_id
 * @property double $vltotal
 * @property integer $qtd
 *
 * The followings are the available model relations:
 * @property TblProdutovenda[] $tblProdutovendas
 * @property TblCliente $cliente
 */
class Venda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_venda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' qtd', 'required'),
			array('cliente_id, qtd', 'numerical', 'integerOnly'=>true),
			array('vltotal', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idvenda, cliente_id, vltotal, qtd', 'safe', 'on'=>'search'),
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
			'tblProdutovendas' => array(self::HAS_MANY, 'TblProdutovenda', 'venda_id'),
			'cliente' => array(self::BELONGS_TO, 'TblCliente', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idvenda' => 'Idvenda',
			'cliente_id' => 'Cliente',
			'vltotal' => 'Vltotal',
			'qtd' => 'Qtd',
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

		$criteria->compare('idvenda',$this->idvenda);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('vltotal',$this->vltotal);
		$criteria->compare('qtd',$this->qtd);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Venda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
