<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $idproducts
 * @property string $productname
 * @property integer $idcompany
 * @property string $productdetail
 * @property double $productprice
 *
 * The followings are the available model relations:
 * @property ProductManufacturers $idcompany0
 */
class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productname, idcompany, productdetail, productprice', 'required'),
			array('idcompany', 'numerical', 'integerOnly'=>true),
			array('productprice', 'numerical'),
			array('productname, productdetail', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproducts, productname, idcompany, productdetail, productprice', 'safe', 'on'=>'search'),
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
			'idcompany0' => array(self::BELONGS_TO, 'ProductManufacturers', 'idcompany'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproducts' => 'Idproducts',
			'productname' => 'Productname',
			'idcompany' => 'Idcompany',
			'productdetail' => 'Productdetail',
			'productprice' => 'Productprice',
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

		$criteria->compare('idproducts',$this->idproducts);
		$criteria->compare('productname',$this->productname,true);
		$criteria->compare('idcompany',$this->idcompany);
		$criteria->compare('productdetail',$this->productdetail,true);
		$criteria->compare('productprice',$this->productprice);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
