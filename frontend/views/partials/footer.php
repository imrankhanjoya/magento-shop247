<?PHP

use yii\helpers\Html;
use yii\helpers\Url;
?>

<footer>


	<div class="row">

		<div class="col-md-4 col-md-offset-2" style="text-align: center">
			<ul style="list-style: none; width:400px; text-align:left;">
				<li><a style="color:#fff">&copy; <?= date("Y") ?> YHS developers. All rights reserved.</a></li>
				<li><a style="color:#fff" href="<?= Url::to(['/page/terms']) ?>">Terms and condition</a></li>
				<li><a style="color:#fff" href="<?= Url::to(['/page/policy']) ?>">Privacy Policy</a></li>
			</ul>
		</div>

		<div class="col-md-4 col-offset-2" style="text-align: center">
			<ul style="list-style: none; text-align:left; ">
				<li>Ajmer</li>
				<li>Pin code: 305023</li>
				<li>Phone/Whatsapp +918209300153</li>
			</ul>

		</div>
	</div>


</footer>

<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localScroll.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>
<!-- GetButton.io widget -->
<script type="text/javascript">
	(function() {
		var options = {
			whatsapp: "+918209300153", // WhatsApp number
			call_to_action: "WhatsApp पैर खरीदे करे| ", // Call to action
			position: "right", // Position may be 'right' or 'left'
		};
		var proto = document.location.protocol,
			host = "getbutton.io",
			url = proto + "//static." + host;
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = url + '/widget-send-button/js/init.js';
		s.onload = function() {
			WhWidgetSendButton.init(host, proto, options);
		};
		var x = document.getElementsByTagName('script')[0];
		x.parentNode.insertBefore(s, x);
	})();
</script>
<!-- /GetButton.io widget -->