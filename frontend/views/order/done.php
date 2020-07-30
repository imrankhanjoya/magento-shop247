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
		<h3>जलदी डिलीवरी के लिए हमारे एजेंट तो व्हाट्सप्प करे| +918209300153</h3>
		<pre>
		<table class="table">
				<tr>
					<td>
						Order ID <?= $OrderDetail['orderid'] ?> 
						<br>Phone <?= $OrderDetail['phone'] ?>
					</td>
				</tr>
				<?php $sum = 0;
				$str = '';
				foreach ($allitems as $key => $val) : $sum = $sum + $val['amount'];  ?>
					<?PHP
					$str .= "\n\r" . $val['name'] . " " . $val['quantity'] . " X " . $val['price'] . " INR" . $val['amount'];
					?>
					<tr>
						<td><?= $val['name']; ?>  <?= $val['quantity']; ?> X <?= $val['price']; ?> = INR <?= $val['amount']; ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td>Total <?= $sum; ?></td>
				</tr>
			</table>

		</pre>
		<?PHP
		$val = "*Order ID" . $OrderDetail['orderid'] . "*";
		$val .= $str . "\n\r";
		$val .= "*Total " . $sum . "*";
		$buyTextRaw = $val;
		$buyText = urldecode($buyTextRaw);
		$shareText = urlencode($buyTextRaw);

		?>

		<h3>Get Faster delivery Update our agent for this. +918209300153</h3>
		<a href="https://wa.me/+918209300153/?text=<?= $shareText ?>" class="btn btn-success pull-left">Share</a>

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