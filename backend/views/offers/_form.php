<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Offers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'offerid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mrp')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput() ?>

    <?= $form->field($model, 'buying_price')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'expire_at')->widget(DatePicker::classname(), ['options' => ['placeholder' => 'Enter event time ...']])->label("Requested Delivery Date") ?>

    <?= $form->field($model, 'created_at')->textInput(['value' => time()]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['value' => time()]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>