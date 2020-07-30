<?php

use yii\helpers\Html;
use backend\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = 'Update Products: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-2">
            <?= $this->render('_upload', ['model' => $uploadmodel,]) ?>

        </div>
        <div class="col-md-10">
            <?PHP foreach ($ProductAttribute as $key => $val) : ?>
                <?= Html::img($val['value'], ['alt' => '', 'class' => 'thumb', 'style' => 'width:100px;height:80px']); ?>
                <br>
                <?= Html::a("remove", ['products/attributedelete', "type" => 'image', 'id' => $val['id'], 'product_id' => $val['product_id']]) ?>
            <?PHP endforeach; ?>
        </div>
    </div>

    <?= $this->render('_form', ['model' => $model,]) ?>

</div>