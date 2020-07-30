<?PHP

use yii\helpers\Html;

$this->title = "घर का राशन घर तक! RationWala!";
$this->registerMetaTag(['name' => 'og:title', 'content' => 'RationWala, grocery, राशन']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Ration-Wala, grocery, राशन, Grocery online delivery service in Ajmer Rajasthan. Atta dala chawal ghar ka sara saman bhaite magaye']);
$this->registerMetaTag(['name' => 'og:description', 'content' => 'Ration-Wala, grocery, राशन, Grocery online delivery service in Ajmer Rajasthan. Atta dala chawal ghar ka sara saman bhaite magaye']);
$this->registerMetaTag(['name' => 'og:image', 'content' => 'http://www.ration-wala.in/img/ration-wala.jpeg']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:site_name', 'content' => 'ration-wala']);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://www.ration-wala.in']);

?>
<div class="container">
	<div class="section">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 centered">
				<h1 class="text-center">घर का राशन घर तक! RationWala!</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 centered">
				<h5 class="text-center ctitle">Happy Customers</h5>
				<div class="col-xs-4 col-md-4">
					<div class="thumbnail noborder centered">
						<?= HTML::img('/img/kalpesh.jpeg', ['class' => 'userimag img-circle', 'alt' => 'happy coustomer kalpesh Ajmer']); ?>
						<h5 class="text-center">Kalpesh, patrika colony(AJ)</h5>

					</div>
				</div>
				<div class="col-xs-4 col-md-4">
					<div class="thumbnail noborder centered">
						<?= HTML::img('/img/kavita.jpeg', ['class' => 'userimag img-circle', 'alt' => 'happy coustomer kavita, panchsheel nagar']); ?>
						<h5 class="text-center">kavita, panchsheel nagar(AJ)</h5>

					</div>
				</div>
				<div class="col-xs-4 col-md-4">
					<div class="thumbnail noborder centered">
						<?= HTML::img('/img/munsif.jpeg', ['class' => 'userimag img-circle', 'alt' => 'happy coustomer Munsif ALi, vaishali nagar']); ?>
						<h5 class="text-center">Munsif ALi, vaishali nagar(AJ)</h5>

					</div>
				</div>

			</div>
			<div class="col-md-8 col-md-offset-2 ">
				<p style="font-size: 14px; margin:0px; text-align:center">We are committed to fulfill all your essential needs! You commit us by joining us!</p>
				<p style="text-align: center;">हम आपकी सभी आवश्यक आवश्यकताओं को पूरा करने के लिए प्रतिबद्ध हैं! आप हमारे साथ जुड़कर हमें प्रतिबद्ध करें!</p>
				<?= $this->render('//partials/joinform', ['model' => $model]); ?>

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