<?PHP

use yii\helpers\Html;

$buyTextRaw = "Order for Super Hero Detergent Powder @ ₹12";
$buyText = urldecode($buyTextRaw);
$shareText = urlencode($buyTextRaw . " http://www.ration-wala.com");
?>
<a href="https://wa.me/+918209300153/?text=<?= $shareText ?>">
	<card class="col-md-12 " style="margin-bottom:10px; height:200px">
		<img src="img/delivery.png" class="img-responsive">
	</card>
</a>