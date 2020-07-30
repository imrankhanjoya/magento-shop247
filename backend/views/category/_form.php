<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

$CategoryModel = new Category();
$allCategory = $CategoryModel->find()->where(['parent' => 0])->asArray()->all();
$allCat[] = "Select Parent Category";
if (!empty($allCategory)) {
    foreach ($allCategory as $key => $val) {
        $allCat[$val['id']] = $val['title'];
    }
}
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList($allCat) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'updated_at')->hiddenInput(['value' => time()])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>