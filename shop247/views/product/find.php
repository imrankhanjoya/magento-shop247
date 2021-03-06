<?PHP
$this->title = $title;
$this->registerMetaTag(['name' => 'og:title', 'content' => $title]);
$this->registerMetaTag(['name' => 'description', 'content' => $description]);
$this->registerMetaTag(['name' => 'og:description', 'content' => $description]);
$this->registerMetaTag(['name' => 'og:image', 'content' => 'http://www.ration-wala.in/img/ration-wala.jpeg']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:site_name', 'content' => 'ration-wala']);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://www.ration-wala.in']);

?>
<div class="container">
	<?= $this->render('//partials/searchbar'); ?>
	<?PHP
	foreach ($productlist as $key => $val) :
		echo $this->render('//partials/productboxsmall', ['val' => $val]);
	endforeach;
	?>

</div>