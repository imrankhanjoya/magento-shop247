<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrdersQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'order_id',
            'phone',
            'name',
            //'address',
            //'pin',
            //'lat',
            //'lan',
            //'status',
            //'careated',
            //'payment_status',
            //['class' => 'yii\grid\ActionColumn'],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function ($model) {
                    $user = Yii::$app->user;
                    $val = Html::a('View', ['orders/done', 'id' => $model->id]);
                    $val .= "<br>";
                    $val .= Html::a('Edit Info', ['orders/update', 'id' => $model->id, 'confirm' => 'no']);
                    $val .= "<br>";
                    $val .= Html::a('Edit Item', ['orders/item', 'id' => $model->id, 'confirm' => 'no']);
                    return $val;
                }
            ],
        ],
    ]); ?>


</div>