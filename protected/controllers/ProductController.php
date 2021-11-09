<?php

class ProductController extends Controller
{
	public function actionIndex()
	{
		$productssql = "SELECT
		products.idproducts,
		products.productname,
		product_manufacturers.product_manufacturer_name,
		products.productdetail,products.productprice
		FROM products
		INNER JOIN product_manufacturers ON products.idcompany=product_manufacturers.idproduct_manufacturers;";
		$productsquery = Yii::app()->db->createCommand($productssql);
		$products = $productsquery->queryAll();

		// $products = Products::model()->findAll();
		$this->render('index', array('products' => $products,));
	}

	public function actionDelete()
	{
		$idproducts = $_POST['idproducts'];
		$idproductssql = "DELETE FROM products WHERE idproducts=$idproducts";
		$idproductsquery = Yii::app()->db->createCommand($idproductssql)->execute();
		echo true;
	}

	public function actionCompanyname()
	{
		echo "Hello";
	}

	public function actionAdd()
	{
		echo "Hello";
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
