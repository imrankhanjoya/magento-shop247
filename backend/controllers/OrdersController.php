<?php

namespace backend\controllers;

use Yii;
use common\models\Orders;
use common\models\Products;
use common\models\Itemname;
use common\models\OrdersQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();
        $model->user_id = 1;
        $model->lat = 1;
        $model->lan = 1;
        $model->status = 1;
        $model->order_id = $model->getOrderId();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['orders/item', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionItem($id)
    {
        $model = new Itemname();
        $model->orderid = $id;
        $model->created = time();
        $allitems = Itemname::findAll(['orderid' => $id]);
        $allProduct = Products::findAll(['status' => 1]);
        $OrderDetail = Orders::findOne(['id' => $id]);


        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['orders/item', 'id' => $id]);
            }
        }

        return $this->render('item', [
            'model' => $model,
            'allProduct' => $allProduct,
            'OrderDetail' => $OrderDetail,
            'allitems' => $allitems
        ]);
    }
    public function actionRemove($orderid, $id)
    {
        if (($model = Itemname::findOne($id)) !== null) {
            $model->delete();
        }
        return $this->redirect(['orders/item', 'id' => $orderid]);
    }
    public function actionDone($id)
    {
        $model = new Itemname();
        $model->orderid = $id;
        $model->created = time();
        $allitems = Itemname::findAll(['orderid' => $id]);
        $allProduct = Products::findAll(['status' => 1]);
        $OrderDetail = Orders::findOne(['id' => $id]);



        return $this->render('done', [
            'model' => $model,
            'allProduct' => $allProduct,
            'OrderDetail' => $OrderDetail,
            'allitems' => $allitems
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
