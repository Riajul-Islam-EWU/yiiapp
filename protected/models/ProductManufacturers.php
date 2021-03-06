<?php

/**
 * This is the model class for table "product_manufacturers".
 *
 * The followings are the available columns in table 'product_manufacturers':
 * @property integer $idproduct_manufacturers
 * @property string $product_manufacturer_name
 * @property integer $company_year
 *
 * The followings are the available model relations:
 * @property Products[] $products
 */
class ProductManufacturers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_manufacturers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_manufacturer_name, company_year', 'required'),
			array('company_year', 'numerical', 'integerOnly'=>true),
			array('product_manufacturer_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproduct_manufacturers, product_manufacturer_name, company_year', 'safe', 'on'=>'search'),
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
			'products' => array(self::HAS_MANY, 'Products', 'idcompany'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproduct_manufacturers' => 'Idproduct Manufacturers',
			'product_manufacturer_name' => 'Product Manufacturer Name',
			'company_year' => 'Company Year',
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

		$criteria->compare('idproduct_manufacturers',$this->idproduct_manufacturers);
		$criteria->compare('product_manufacturer_name',$this->product_manufacturer_name,true);
		$criteria->compare('company_year',$this->company_year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductManufacturers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
