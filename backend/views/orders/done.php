<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */

$sum = 0;

?>
<div class="container">
	<div class="section">
		<div id="printableArea" class="col-md-12">
			<div class="row">
				<div class="col-md-6" style="float: left;">
					<img src="http://www.ration-wala.in/logo_t.png">

				</div>
				<div class="col-md-6" style="float: right;">
					<h5>INVOICE <?= $OrderDetail['order_id'] ?></h5>
					<br>
					<h5>Bill From</h5>
					Ajmer
					<br>Pin code: 305023
					<br>Phone/Whatsapp +918209300153
					</ul>

				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6" style="float: left;">
					<h5>Bill To</h5>
					Name: <?= $OrderDetail['name'] ?><br>
					Phone: <?= $OrderDetail['phone'] ?>
					Address: <?= $OrderDetail['address'] ?><br>
					pincode: <?= $OrderDetail['pin'] ?>

				</div>
				<div class="col-md-6" style="float: right;">
					<br>
					<br>
					Bill Date: <?= date("Y-m-d", $OrderDetail['careated']) ?><br>
					Payment Terms: <?= $OrderDetail['payment_status'] ?><br>

				</div>
			</div>
			<br>
			<br>

			<table class="table">
				<tr>
					<td><b>Name</b></td>
					<td><b>Qty</b></td>
					<td><b>Price</b></td>
					<td><b>Amount</b></td>
				</tr>
				<?php $sum = 0;
				foreach ($allitems as $key => $val) : $sum = $sum + $val['amount'];  ?>
					<tr>
						<td><?= $val['name']; ?></td>
						<td> <?= $val['quantity']; ?></td>
						<td> <?= $val['price']; ?></td>
						<td> <?= $val['amount']; ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td></td>
					<td>Total</td>
					<td> <?= $sum; ?></td>
				</tr>
			</table>
		</div>
		<input type="button" onclick="printDiv('printableArea')" value="print a Bill!" />

	</div>
	<div class="section">
		<h3>SMS/Whatsapp order summery</h3>
		<pre>
		<table class="table">
				<tr>
					<td>Order ID <?= $OrderDetail['orderid'] ?> </td>
				</tr>
				<?php $sum = 0;
				foreach ($allitems as $key => $val) : $sum = $sum + $val['amount'];  ?>
					<tr>
						<td><?= $val['name']; ?>  <?= $val['quantity']; ?> X <?= $val['price']; ?> = INR <?= $val['amount']; ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td>Total <?= $sum; ?></td>
				</tr>
			</table>
		</pre>
	</div>
</div>
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>