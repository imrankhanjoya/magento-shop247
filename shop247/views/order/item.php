<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */

$sum = 0;
$allinventory = [];
$allinventoryInfo = [];

foreach ($allProduct as $key => $val) {
	$allinventory[] = $val['title'];
	$allinventoryInfo[$val['title']] = array($val['title'], $val['sale_price']);
}

?>

<script>
	var infoData = <?= json_encode(($allinventoryInfo)) ?>;
</script>
<div class="container">
	<div class="section">
		<div id="printableArea" class="col-md-12">
			<h4>Add item to your order <?= $OrderDetail['name'] ?> your order id is <?= $OrderDetail['orderid'] ?></h4>
			<!-- <table class="table">
				<tr>
					<td>Order number: <?= $OrderDetail['orderid'] ?></td>
					<td></td>
				</tr>
				<tr>
					<td>
						Name: <?= $OrderDetail['name'] ?><br>
						Phone: <?= $OrderDetail['phone'] ?>
					</td>
					<td>
						Address: <?= $OrderDetail['address'] ?><br>
						pincode: <?= $OrderDetail['pin'] ?>
					</td>

				</tr>
			</table> -->
			<?php if (!empty($allitems)) : ?>
				<table class="table">
					<tr>
						<td>Name</td>
						<td>Qty</td>
						<td>Price</td>
						<td>Amount</td>
						<td></td>
					</tr>
					<?php foreach ($allitems as $key => $val) : $sum = $sum + $val['amount'];  ?>
						<tr>
							<td><?= $val['name']; ?></td>
							<td> <?= $val['quantity']; ?></td>
							<td> <?= $val['price']; ?></td>
							<td> <?= $val['amount']; ?></td>
							<td> <?= Html::a("Remove", ['order/removeitem', 'id' => $val['id'], 'orderid' => $OrderDetail['id']]); ?></td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td></td>
						<td></td>
						<td>Total</td>
						<td> <?= $sum; ?></td>
						<td></td>
					</tr>
				</table>
			<?PHP endif; ?>
		</div>

		<div class="col-md-12">
			<div class="orders-form">
				<?php $form = ActiveForm::begin(); ?>
				<?= $form->field($model, 'orderid')->hiddenInput()->label(false) ?>

				<div class="row">
					<div class="col-md-9">
						<?PHP
						echo $form->field($model, 'name')->widget(\yii\jui\AutoComplete::classname(), [
							'clientOptions' => [
								'source' => $allinventory,
								'autoFill' => true,
								'minLength' => '1',
								'select' => new JsExpression("function( event, ui ) {
									
									$('#itemname-price').val(infoData[ui.item.value][1]);

							   }")
							],
						])->label(false);

						?>
					</div>
					<div class="col-md-1">
						<?= $form->field($model, 'price')->hiddenInput(['maxlength' => true,  'onkeyup' => 'updatetotal()', 'placeholder' => 'price'])->label(false) ?>
					</div>
					<div class="col-md-1">
						<?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'onkeyup' => 'updatetotal()', 'placeholder' => 'qty'])->label(false) ?>
					</div>
					<div class="col-md-1">
						<?= $form->field($model, 'amount')->hiddenInput(['maxlength' => true,  'placeholder' => 'Total amount'])->label(false) ?>
					</div>
				</div>
				<?= $form->field($model, 'created')->hiddenInput()->label(false) ?>
				<div class="form-group">
					<?= Html::a('Done', ['order/done', 'id' => $OrderDetail['id']], ['class' => 'btn btn-success pull-left']) ?>
					<?= Html::submitButton('Save & Add more', ['class' => 'btn btn-success pull-right']) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
<script>
	function updatetotal() {
		var qty = document.getElementById('itemname-quantity').value;
		var price = document.getElementById('itemname-price').value;
		document.getElementById('itemname-amount').value = qty * price;
	}
</script>