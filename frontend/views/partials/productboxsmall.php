<?PHP

use yii\helpers\Html;
use yii\helpers\Url;

$buyTextRaw = "Order for " . $val['title'] . " @" . $val['sale_price'];
$buyText = urldecode($buyTextRaw);
$shareText = urlencode($buyTextRaw . " http://www.ration-wala.in");
?>
<div class='col-md-2 col-xs-6' style='margin-bottom: 30px;'>
	<div class="card">
		<span class="badge badge-pill badge-warning" style="position:absolute ; top:5px;"><?= round(($val['mrp'] - $val['sale_price']) / $val['mrp'] * 100) ?>%off</span>
		<a href="<?= Url::to(['product/detail', 'title' => trim($val['title'])]) ?>">
			<?PHP echo Html::img("/" . $val['image'], ['alt' => $val['title'], 'class' => 'img-responsive']);
			?>
		</a>
		<a href="<?= Url::to(['product/detail', 'title' => trim($val['title'])]) ?>">
			<h5 class="card-title text-center" style="height: 40px;"><?= trim($val['title']) ?></h5>
		</a>
		<p class="text-center">
			<span style="text-decoration: line-through;" style="font-size:small">MRP ₹<?= $val['mrp'] ?></span>
			<span><b>Price ₹<?= $val['sale_price'] ?></b></span>
		</p>
		<p>
			<a href="https://wa.me/+917878584343/?text=<?= $shareText ?>" class="btn btn-success pull-left">Share</a>
			<a href="https://wa.me/+917878584343/?text=<?= $buyText ?>" class="btn btn-warning pull-right">Buy Now</a>
		</p>
	</div>
</div>