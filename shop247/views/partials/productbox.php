<?PHP

use yii\helpers\Html;
use yii\helpers\Url;

$buyTextRaw = "Order for " . $val['title'] . " @" . $val['sale_price'];
$buyText = urldecode($buyTextRaw);
$shareText = urlencode($buyTextRaw . " http://www.ration-wala.in");
$discount = round(($val['mrp'] - $val['sale_price']) / $val['mrp'] * 100) . " %off";
$title = $val['title'] . " buy @ ₹" . $val['sale_price'] . " MRP ₹" . $val['mrp'];
$description = "Buy " . $val['title'] . " @ ₹" . $val['sale_price'] . " of MRP ₹" . $val['mrp'] . " discount of " . $discount;
$imageUrl = "http://www.ration-wala.in" . Url::to("/" . $val['image']);
$pageurl = "http://www.ration-wala.in" . Yii::$app->request->url;

?>
<h1 class="text-center"><?= $val['title'] ?></h1>
<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2	" style="margin-bottom:10px;">

	<div class="card">
		<span class="badge badge-pill badge-warning" style="position:absolute ; top:5px;"><?= $discount ?></span>
		<center>
			<?PHP echo Html::img("/" . $val['image'], ['alt' => $val['title'], 'class' => 'img-responsive']);
			?></center>

		<p class="text-center">
			<span style="text-decoration: line-through;">MRP ₹<?= $val['mrp'] ?></span>
			<span><b>Price ₹<?= $val['sale_price'] ?></b></span>
		</p>
		<p>
			<a href="https://wa.me/+918209300153/?text=<?= $shareText ?>" class="btn btn-success pull-left">Share</a>
			<a href="https://wa.me/+918209300153/?text=<?= $buyText ?>" class="btn btn-warning pull-right">Buy Now</a>
		</p>
	</div>
</div>