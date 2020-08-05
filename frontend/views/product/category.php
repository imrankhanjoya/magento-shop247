<?PHP
$this->title = $title;
$this->registerMetaTag(['name' => 'og:title', 'content' => $title]);
$this->registerMetaTag(['name' => 'description', 'content' => $description]);
$this->registerMetaTag(['name' => 'og:description', 'content' => $description]);
$this->registerMetaTag(['name' => 'og:image', 'content' => 'http://www.shop-247.in/img/shop-247.jpeg']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:site_name', 'content' => 'shop-247']);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://www.shop-247.in']);

?>
<div class="container">
	<div class="section">
		<?= $this->render('//partials/category'); ?>
		<h1 class="text-center"><?= $title ?></h1>
	</div>
	<div class="section">
		<div class="row">
			<?PHP
			foreach ($productlist as $key => $val) :
				echo $this->render('//partials/productboxsmall', ['val' => $val]);

			endforeach;
			?>

		</div>
	</div>


</div>