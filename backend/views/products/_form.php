<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Brand;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */

$BrandModel = new Brand();
$allBrand = $BrandModel->find()->orderBy(['title' => 'desc'])->asArray()->all();
$allBrandVal[] = "Select Brand";
if (!empty($allBrand)) {
    foreach ($allBrand as $key => $val) {
        $allBrandVal[$val['id']] = $val['title'];
    }
}
$CategoryModel = new Category();
$allCategory = $CategoryModel->find()->orderBy(['title' => 'desc'])->asArray()->all();
$allCategoryVal[] = "Select Category";
if (!empty($allCategory)) {
    foreach ($allCategory as $key => $val) {
        $allCategoryVal[$val['id']] = $val['title'];
    }
}
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand_id')->dropDownList($allBrandVal) ?>
    <?= $form->field($model, 'category_id')->dropDownList($allCategoryVal) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'sku')->textInput(['maxlength' => true])->label("SKU") ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'mrp')->textInput()->label("MRP") ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'sale_price')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'buying_price')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'status')->dropDownList([0 => 'Inactive', 1 => 'active'])
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'rank')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'created_at')->hiddenInput(['value' => time()])->label(false) ?> <?= $form->field($model, 'updated_at')->hiddenInput(['value' => time()])->label(false) ?> <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>