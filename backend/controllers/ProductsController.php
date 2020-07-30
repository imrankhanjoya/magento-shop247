<?php

namespace backend\controllers;

use Yii;
use common\models\Products;
use common\models\Brand;
use common\models\ProductsQuery;
use common\models\ProductAttribute;
use backend\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {


        $searchModel = new ProductsQuery();
        $query = [];
        $productlist = $searchModel->find()->select(['products.*', 'brand.title as brandname', 'product_attribute.value as image'])
            ->leftJoin('brand', 'brand.id = products.brand_id')
            ->leftJoin('product_attribute', 'product_attribute.product_id = products.id and product_attribute.entity ="image"')
            ->asArray()->all();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 200;

        $brands = new brand();
        $brands = $brands->find()->asArray()->all();
        $allBrands = [];
        foreach ($brands as $key => $val) {
            $allBrands[$key] = $val['title'];
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allBrands' => $allBrands
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadmodel = new UploadForm();

        if (Yii::$app->request->isPost) {
            $uploadmodel->imageFile = UploadedFile::getInstance($uploadmodel, 'imageFile');
            $fileName = $uploadmodel->upload('medium');
            if ($fileName) {
                echo "Upload done";
                $ProductAttribute = new ProductAttribute();
                $ProductAttribute->product_id = $id;
                $ProductAttribute->entity = 'image';
                $ProductAttribute->value = $fileName;
                $ProductAttribute->created_at = time();
                $ProductAttribute->updated_at = time();
                $ProductAttribute->save();
            }
        }
        $ProductAttribute = new ProductAttribute();
        $ProductAttribute = $ProductAttribute->find()->where(['product_id' => $id])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }



        return $this->render('update', [
            'model' => $model,
            'uploadmodel' => $uploadmodel,
            'ProductAttribute' => $ProductAttribute,
        ]);
    }

    public function actionAttributedelete($type, $id, $product_id)
    {

        $ProductAttribute = new ProductAttribute();
        $ProductAttribute = $ProductAttribute->find()->where(['product_id' => $product_id, "entity" => $type, "id" => $id])->one()->delete();
        return $this->redirect(['products/update', 'id' => $product_id]);
    }
    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
