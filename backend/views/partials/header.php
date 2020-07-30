<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);

NavBar::begin([
	'brandLabel' => "RationWala",
	'brandUrl' => Yii::$app->homeUrl,
	'options' => [
		'class' => 'navbar-inverse navbar-fixed-top',
	],
]);
$menuItems = [
	['label' => 'Home', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
	$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
	$menuItems[] = ['label' => 'Brands', 'url' => ['/brand']];
	$menuItems[] = ['label' => 'Category', 'url' => ['/category']];
	$menuItems[] = ['label' => 'Products', 'url' => ['/products']];
	$menuItems[] = ['label' => 'Offers', 'url' => ['/offers']];
	$menuItems[] = ['label' => 'Orders', 'url' => ['/orders']];
	$menuItems[] = ['label' => 'Users', 'url' => ['/user']];
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
