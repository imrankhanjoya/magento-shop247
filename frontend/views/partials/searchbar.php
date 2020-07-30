<?PHP

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;
use frontend\models\Search;

$model = new Search();
?>
<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
		<?= $form->field($model, 'find')->textInput(['autofocus' => true])->label("Find your grocery") ?>
		<div class="form-group">
			<?= Html::submitButton('Find खोजे', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>