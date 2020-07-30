<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
	<div class="section">
		<div class="col-md-12">


			<div class="orders-form">

				<?php $form = ActiveForm::begin(); ?>

				<?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

				<?= $form->field($model, 'order_id')->hiddenInput()->label(false) ?>
				<div class="row">
					<div class="col-md-6">
						<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

					</div>
					<div class="col-md-6">
						<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

					</div>
				</div>


				<?= $form->field($model, 'address')->textArea(['maxlength' => true]) ?>

				<?= $form->field($model, 'pin')->textInput(['maxlength' => true]) ?>

				<?= $form->field($model, 'lat')->hiddenInput(['maxlength' => true])->label(false) ?>

				<?= $form->field($model, 'lan')->hiddenInput(['maxlength' => true])->label(false) ?>

				<?= $form->field($model, 'status')->hiddenInput(['maxlength' => true])->label(false) ?>

				<?= $form->field($model, 'careated')->hiddenInput()->label(false) ?>

				<?= $form->field($model, 'payment_status')->hiddenInput(['maxlength' => true])->label(false) ?>

				<div class="form-group">
					<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>

				<?php ActiveForm::end(); ?>

			</div>

		</div>
	</div>
</div>