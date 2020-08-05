<?PHP

use yii\helpers\Html;

$buyTextRaw = "Order for Super Hero Detergent Powder @ ₹12";
$buyText = urldecode($buyTextRaw);
$shareText = urlencode($buyTextRaw . " http://www.shop-247.in");
?>
<a href="https://wa.me/+917878584343/?text=<?= $shareText ?>">
	<card class="col-md-12 " style="margin-bottom:10px; height:200px">
		<img src="img/hero.jpeg" class="img-responsive">
	</card>
</a>