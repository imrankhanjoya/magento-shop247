<?php

namespace shop247\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Products;
use common\models\Brand;
use common\models\Category;
use common\models\ProductsQuery;
use common\models\ProductAttribute;
use frontend\models\Search;
use frontend\models\JoinForm;


/**
 * Site controller
 */
class ProductController extends Controller
{
	public function actionIndex()
	{

		$searchModel = new ProductsQuery();
		$productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
			->leftJoin('brand', 'brand.id = products.brand_id')
			->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
			->where(['status' => 1])
			->orderBy(['rank' => SORT_DESC])
			->asArray()->all();
		return $this->render('index', [
			'productlist' => $productlist,
		]);
	}
	public function actionDetail($title)
	{
		$title = urldecode($title);
		$searchModel = new ProductsQuery();

		$prodcutDetail = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
			->leftJoin('brand', 'brand.id = products.brand_id')
			->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
			->where(['status' => 1])
			->where(['products.title' => $title])
			->orderBy(['rank' => SORT_DESC])
			->asArray()->one();
		return $this->render('detail', [
			'prodcutDetail' => $prodcutDetail,
		]);
	}
	public function actionFind($key = 'all')
	{
		$this->layout = 'ration';
		if (Yii::$app->request->post()) {
			$val = Yii::$app->request->post();
			if (isset($val['Search'])) {
				return $this->redirect(['product/find', 'key' => $val['Search']['find']]);
			}
		}
		$searchModel = new ProductsQuery();

		$productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
			->leftJoin('brand', 'brand.id = products.brand_id')
			->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
			->where(['status' => 1])
			->andwhere(['like', 'products.title', $key])
			->orderBy(['rank' => SORT_DESC])
			->asArray()->all();
		$title = "Find $key your घर का राशन! at RationWala!";
		$description = 'Find $key at Ration-Wala, राशन, Grocery online delivery service in Ajmer Rajasthan. Atta dala chawal ghar ka sara saman ghar bhaite magaye. Free delivery at home';
		if (empty($productlist)) {
			$productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
				->leftJoin('brand', 'brand.id = products.brand_id')
				->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
				->where(['status' => 1])
				->orderBy(['rank' => SORT_DESC])
				//->andwhere(['like', 'products.title', $key])
				->asArray()->limit(28)->all();
		}

		return $this->render('find', [
			'productlist' => $productlist,
			'title' => $title,
			'description' => $description
		]);
	}

	public function actionCategory($catname)
	{
		$this->layout = 'ration';
		$catModel = new Category();

		if ($catname == 'biscuit-namkeen') {
			$cat = $catModel->find()->where(['in', 'title', array('namkeen', 'Biscuits', 'Dry fruits', 'Noodles')])->all();
		} else if ($catname == 'detergent') {
			$cat = $catModel->find()->where(['in', 'title', array('Detergent Powder', 'Detergents', 'Detergent bar', 'Body soap')])->all();
		} else if ($catname == 'cleaning') {
			$cat = $catModel->find()->where(['in', 'title', array('Fabric Care', 'Fabric Wash', 'Dish Wash')])->all();
		} else if ($catname == 'Spices') {
			$cat = $catModel->find()->where(['in', 'title', array('Baking Powder', 'Masala & Spices', 'Masala')])->all();
		} else {
			$cat = $catModel->find()->where(['title' => $catname])->all();
		}


		$catArray = [];
		foreach ($cat as $key => $val) {
			$catArray[] = $val->id;
		}



		$searchModel = new ProductsQuery();

		$productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
			->leftJoin('brand', 'brand.id = products.brand_id')
			->leftJoin('category', 'category.id = products.category_id')
			->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
			->where(['status' => 1])
			->andwhere(['in', 'category.id', $catArray])
			->orderBy(['rank' => SORT_DESC])
			->asArray()->all();

		if (empty($productlist)) {
			$productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
				->leftJoin('brand', 'brand.id = products.brand_id')
				->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
				->where(['status' => 1])
				//->andwhere(['like', 'products.title', $key])
				->orderBy(['rank' => SORT_DESC])
				->asArray()->all();
		}
		$title = "Find $catname घर का राशन! at RationWala!";
		$description = 'Find ' . $catname . ' at Ration-Wala, राशन, Grocery online delivery service in Ajmer Rajasthan. Atta dala chawal ghar ka sara saman ghar bhaite magaye. Free delivery at home';


		return $this->render('category', [
			'productlist' => $productlist,
			'title' => $title,
			'description' => $description
		]);
	}

	public function actionSite()
	{

		$searchModel = new ProductsQuery();
		$productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
			->leftJoin('brand', 'brand.id = products.brand_id')
			->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
			->where(['status' => 1])
			->orderBy(['rank' => SORT_DESC])
			->asArray()->limit(18)->all();

		$model = new JoinForm();
		if ($model->load(Yii::$app->request->post())) {
			$model->password = rand(1, 10000) . time();
			if ($model->signup()) {
				Yii::$app->session->setFlash('success', 'Thank you for registration. ');
				return $this->goHome();
			}
		}


		return $this->render('site', ['productlist' => $productlist, 'model' => $model]);
	}
}
