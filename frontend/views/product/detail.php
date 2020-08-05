<?PHP

use yii\helpers\Html;
use yii\helpers\Url;

$discount = round(($prodcutDetail['mrp'] - $prodcutDetail['sale_price']) / $prodcutDetail['mrp'] * 100) . " %off";
$title = $prodcutDetail['title'] . " buy @ ₹" . $prodcutDetail['sale_price'] . " MRP ₹" . $prodcutDetail['mrp'];
$description = "Buy " . $prodcutDetail['title'] . " @ ₹" . $prodcutDetail['sale_price'] . " of MRP ₹" . $prodcutDetail['mrp'] . " discount of " . $discount;
$imageUrl = "http://www.shop-247.in" . Url::to("/" . $prodcutDetail['image']);
$pageurl = "http://www.shop-247.in" . Yii::$app->request->url;
$this->title = $title;
$this->registerMetaTag(['name' => 'og:title', 'content' => $title]);
$this->registerMetaTag(['name' => 'description', 'content' => $description]);
$this->registerMetaTag(['name' => 'og:description', 'content' => $description]);
$this->registerMetaTag(['name' => 'og:image', 'content' => $imageUrl]);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:site_name', 'content' => 'shop-247']);
$this->registerMetaTag(['name' => 'og:url', 'content' => $pageurl]);
?>
<script type="application/ld+json">
	{
		"@context": "https://schema.org/",
		"@type": "Product",
		"name": "<?= $prodcutDetail['title'] ?>",
		"image": [
			"<?= $imageUrl ?>"
		],
		"description": "<?= $description ?>",
		"sku": "<?= $prodcutDetail['sku'] ?>",
		"mpn": "<?= $prodcutDetail['mrp'] ?>",
		"brand": {
			"@type": "Brand",
			"name": "<?= $prodcutDetail['brandname'] ?>"
		},
		"review": {
			"@type": "Review",
			"author": {
				"@type": "Person",
				"name": "<?= $prodcutDetail['brandname'] ?>"
			}
		},
		"offers": {
			"@type": "Offer",
			"url": "<?= $pageurl ?>",
			"priceCurrency": "INR",
			"price": "<?= $prodcutDetail['sale_price'] ?>",
			"priceValidUntil": "2020-09-01",
			"itemCondition": "https://schema.org/UsedCondition",
			"availability": "https://schema.org/InStock",
			"seller": {
				"@type": "Organization",
				"name": "SHOP-247"
			}
		}
	}
</script>
<div class="container">
	<div class="row">
		<?PHP
		echo $this->render('//partials/productbox', ['val' => $prodcutDetail]);
		?>
	</div>
</div>