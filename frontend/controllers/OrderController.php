<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Itemname;
use common\models\Orders;
use common\models\ProductsQuery;
use common\models\ProductAttribute;
use common\models\Products;
use frontend\models\Search;
use yii\rbac\Item;

/**
 * Site controller
 */
class OrderController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
	public function actionAdd()
	{
		$session = Yii::$app->session;

		$model = new Orders();
		$model->load(Yii::$app->session->get('address'));
		$model->order_id = $model->getOrderId();
		$model->user_id = 0;
		$model->lat = 0;
		$model->lan = 0;
		$model->status = 'inprocess';
		$model->payment_status = 'inprocess';
		$model->careated = time();

		if ($model->load(Yii::$app->request->post())) {
			if ($model->save()) {
				Yii::$app->session->set('address', Yii::$app->request->post());
				return $this->redirect(['order/item', 'id' => base64_encode($model->id . "oval" . time())]);
			} else {
				print_r($model->errors);
			}
		}
		return $this->render('add', ['model' => $model]);
	}

	public function actionItem($id)
	{
		$passval = $id;
		$oval = base64_decode($id);
		$oval = explode('oval', $oval);
		$id = $oval[0];
		$model = new Itemname();
		$model->orderid = $id;
		$model->created = time();
		$allitems = Itemname::findAll(['orderid' => $id]);
		$allProduct = Products::find()->where(['status' => 1])->asArray()->all();
		$OrderDetail = Orders::findOne(['id' => $id]);


		if ($model->load(Yii::$app->request->post())) {
			if ($model->save()) {
				return $this->redirect(['order/item', 'id' => $passval]);
			}
		}

		return $this->render('item', [
			'model' => $model,
			'allProduct' => $allProduct,
			'OrderDetail' => $OrderDetail,
			'allitems' => $allitems
		]);
	}

	public function actionRemoveitem($id, $orderid)
	{
		if (($model = Itemname::findOne($id)) !== null) {
			$model->delete();
		}
		return $this->redirect(['order/item', 'id' => $orderid]);
	}

	public function actionDone($id)
	{
		$allitems = Itemname::findAll(['orderid' => $id]);
		$OrderDetail = Orders::findOne(['id' => $id]);



		return $this->render('done', [
			'OrderDetail' => $OrderDetail,
			'allitems' => $allitems
		]);
	}
}
