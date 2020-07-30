<?PHP

use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="row">
	<div class="col-md-6 col-xs-12 text-center col-md-offset-3">
		<ul class="list-inline">
			<li>
				<a href="<?= Url::to(['product/category', 'catname' => 'all'], $schema = true) ?>">
					<?= Html::img('/img/bakery_d.svg', ['class' => 'img-responsive img-circle icon']) ?>
					Grocery
				</a>
			</li>
			<li>
				<a href="<?= Url::to(['product/category', 'catname' => 'spices'], $schema = true) ?>">
					<?= Html::img('/img/spice_d.svg', ['class' => 'img-responsive img-circle icon']) ?>
					Spices
				</a>
			</li>
			<li>
				<a href="<?= Url::to(['product/category', 'catname' => 'biscuit-namkeen'], $schema = true) ?>">
					<center>
						<?= Html::img('/img/biscuit_d.svg', ['class' => 'img-responsive img-circle icon']) ?>
					</center>
					Bakery
				</a>
			</li>
			<li>
				<a href="<?= Url::to(['product/category', 'catname' => 'soap'], $schema = true) ?>">
					<?= Html::img('/img/body-scrub_d.svg', ['class' => 'img-responsive img-circle icon']) ?>
					Cleaning
				</a>
			</li>
			<li>
				<a href="<?= Url::to(['product/category', 'catname' => 'detergent'], $schema = true) ?>">
					<?= Html::img('/img/detergent_d.svg', ['class' => 'img-responsive img-circle icon']) ?>
					Detergent
				</a>
			</li>
		</ul>
	</div>
</div>