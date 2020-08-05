<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="jumbotron">
	<h1>घर का राशन घर तक! Shop 24/7!</h1>
	<p style="font-size: 14px; margin:0px">We are committed to fulfill all your essential needs! You commit us by joining us!</p>
	<p>हम आपकी सभी आवश्यक आवश्यकताओं को पूरा करने के लिए प्रतिबद्ध हैं! आप हमारे साथ जुड़कर हमें प्रतिबद्ध करें!</p>
	<?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'form-inline']]); ?>
	<div class="form-group mb-6">
		<?= $form->field($model, 'username')->textInput(['placeholder' => 'Enter Phone number'])->label(false) ?>
	</div>
	<?= Html::submitButton('Join with phone', ['class' => 'btn btn-primary mb-2', 'name' => 'signup-button']) ?>
	<?php ActiveForm::end(); ?>
</div>