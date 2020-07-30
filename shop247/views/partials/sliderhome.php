<?PHP

use yii\helpers\Html;

$buyTextRaw = "Want to buy Hero detergent";
$buyText = urldecode($buyTextRaw);
$shareText = urlencode($buyTextRaw . "http://www.ration-wala.com");

$deliverymsg = urlencode("Want to know more about free delivery.");

$image[] = ["image" => "/img/hero.jpeg", "url" => "https://wa.me/+918209300153/?text=" . $shareText];
$image[] = ["image" => "/img/delivery.png", "url" => "https://wa.me/+918209300153/?text=" . $deliverymsg];

?>
<div class="row hidden-md hidden-lg">
	<div class="col-sm-12 col-xs-12">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?PHP foreach ($image as $key => $val) : ?>
					<div class="item">

						<?= Html::img($val['image']); ?>
					</div>
				<?PHP endforeach; ?>

			</div>


		</div>
	</div>
</div>

<div class="row">
	<?PHP $i = 0;
	foreach ($image as $key => $val) : $i++ ?>
		<div class="col-md-6 col-xs-6 col-sm-6" style="padding:5px">
			<a href="<?= $val['url'] ?>">
				<?= Html::img($val['image'], ['class' => 'img-responsive']); ?>
			</a>
		</div>
	<?PHP if ($i == 2) {
			break;
		}
	endforeach; ?>


</div>