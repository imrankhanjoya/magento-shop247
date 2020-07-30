<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OmsInventory */

$this->title = 'Update Oms Inventory: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Oms Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oms-inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
