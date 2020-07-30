<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OmsInventoryQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oms Inventories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-inventory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Oms Inventory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sku',
            'title',
            'category',
            'sub',
            //'master',
            //'quantity',
            //'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
