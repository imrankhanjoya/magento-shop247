<?PHP

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

?>
<div class="row">
	<div class="col-lg-8 col-xs-10 col-xs-offset-1 col-lg-offset-2">
		<div class="input-group hidden-sm hidden-xs">
			<?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'form-inline']]); ?>
			<?= $form->field($model, 'username')->textInput(['placeholder' => 'Enter Phone number', 'style' => 'width:300px',])->label(false) ?>
			<?= Html::submitButton('Join with phone', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
			<?php ActiveForm::end(); ?>
		</div><!-- /input-group -->
	</div><!-- /.col-lg-6 -->
	<div class="col-sm-12 col-xs-12">
		<div class="input-group hidden-md hidden-lg" style="width: 100%;">
			<?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => []]); ?>
			<?= $form->field($model, 'username')->textInput(['placeholder' => 'Enter Phone number', 'style' => 'width:100%'])->label(false) ?>
			<?= Html::submitButton('Join with phone', ['class' => 'btn btn-primary', 'style' => 'width:100%', 'name' => 'signup-button']) ?>
			<?php ActiveForm::end(); ?>
		</div><!-- /input-group -->

	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->