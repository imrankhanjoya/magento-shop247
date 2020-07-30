<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <img src="http://www.ration-wala.in/logo_t.png">
            <br>
            <h3>Bill From</h3>
            Ajmer
            <br>Pin code: 305023
            <br>Phone/Whatsapp +918209300153
            </ul>
        </div>
        <div class="col-md-6">INVOICE
            <?= $form->field($model, 'order_id')->textInput()->label(false) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            Bill To
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Customer Name'])->label(false) ?>
            <?= $form->field($model, 'address')->textArea(['maxlength' => true, 'placeholder' => 'Customer Address'])->label(false) ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'pin')->textInput(['maxlength' => true, 'placeholder' => 'Pin Code'])->label(false) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Customer Phone'])->label(false) ?>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'careated')->textInput(['value' => time()])->label("Bill Date") ?>

            <?= $form->field($model, 'payment_status')->textInput(['maxlength' => true, 'value' => 'Payment mode COD'])->label(false) ?>
        </div>
    </div>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'order_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'lan')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>