<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Please fill out the following fields to signup:</p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
			<div class="col-lg-6">
				<?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Phone") ?>
			</div>
			<div class="col-lg-6">
				<?= $form->field($model, 'name') ?>
			</div>
			<?= $form->field($model, 'address')->textInput(['autofocus' => true])->label("Customer address") ?>
			<div class="col-lg-6">
				<?= $form->field($model, 'city')->textInput(['autofocus' => true])->label("City") ?>
			</div>
			<div class="col-lg-6">
				<?= $form->field($model, 'pincode') ?>
			</div>
			<?= $form->field($model, 'password')->hiddenInput(['value' => time() . "pass"])->label(false) ?>
			<?= $form->field($model, 'email')->hiddenInput(['value' => time() . "@gmail.com"])->label(false) ?>
			<div class="form-group">
				<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
			</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>