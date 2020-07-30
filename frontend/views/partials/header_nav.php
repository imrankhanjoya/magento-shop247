
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);

NavBar::begin([
	'brandLabel' => Html::img("/logo_t.png", ['style' => 'height:40px; margin-top:-10px']),
	'brandUrl' => Yii::$app->homeUrl,
	'options' => [
		'class' => 'navbar navbar-default navbar-fixed-top nav-css',
	],
]);
$menuItems = [
	['label' => 'Home', 'url' => ['/']],
	['label' => 'Order', 'url' => ['order/add']],
	['label' => 'Search', 'url' => ['/product/find']],
];
if (Yii::$app->user->isGuest) {
	//$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
	//$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
	$menuItems[] = '<li>'
		. Html::beginForm(['/site/logout'], 'post')
		. Html::submitButton(
			'Logout (' . Yii::$app->user->identity->username . ')',
			['class' => 'btn btn-link logout']
		)
		. Html::endForm()
		. '</li>';
}
echo Nav::widget([
	'options' => ['class' => 'navbar-nav navbar-right'],
	'items' => $menuItems,
]);
NavBar::end();
