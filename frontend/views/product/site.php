<?PHP

use yii\helpers\Html;

$this->title = "घर का राशन घर तक! shop-247!";
$this->registerMetaTag(['name' => 'og:title', 'content' => 'shop-247, grocery, राशन']);
$this->registerMetaTag(['name' => 'description', 'content' => 'shop-247, grocery, राशन, Grocery online delivery service in Ajmer Rajasthan. Atta dala chawal ghar ka sara saman bhaite magaye']);
$this->registerMetaTag(['name' => 'og:description', 'content' => 'shop-247, grocery, राशन, Grocery online delivery service in Ajmer Rajasthan. Atta dala chawal ghar ka sara saman bhaite magaye']);
$this->registerMetaTag(['name' => 'og:image', 'content' => 'http://www.shop-247.in/img/ration-wala.jpeg']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:site_name', 'content' => 'shop-247']);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://www.shop-247.in']);

?>
<div class="container">
	<div class="section">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 centered">
				<h1 class="text-center">घर का राशन घर तक! RationWala!</h1>
			</div>
		</div>



	</div>


	<div class="section">
		<?php echo $this->render('//partials/chat_order'); ?>
	</div>

	<div class="section">
		<?= $this->render('//partials/sliderhome'); ?>
	</div>



	<div class="section">
		<?= $this->render('//partials/category'); ?>
		<h3 class="text-center">Grocery list at ration-wala</h3>
		<div class="row">
			<?PHP
			foreach ($productlist as $key => $val) :
				echo $this->render('//partials/productboxsmall', ['val' => $val]);
			endforeach;
			?>

		</div>
	</div>


</div>