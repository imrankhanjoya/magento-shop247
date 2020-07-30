<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoryQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent',
            'title',
            'description',
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?PHP

/*
Category
Atta
Oil
tea
coffe
Sugar
Rice
Salt
Maida
Suji
Rawa
Ghee
Detergent bar
Poha
Namkeen
Biscuits
Dry fruits
Noodles
Baking Powder
ENO
Body soap
Detergent Powder 
Masala & Spices 
Dal & Pulses
Pickles
Detergents
Rice & Rice Products
Tea & Coffee
Edible Oil & Ghee
Jams & Spreads
DISPOSABLE
Flours & Grains 
Ready to cook
PAPAD
Salt, Sugar & Jaggery
Pasta & Noodles
Pulses
Masala & Spices
Disposables
Grocery & Gourmet Foods
Pickle
Fabric Care
Coffee
Honey
Phenyl
Flavor
Jam
Catchup
Papad/ Wadi
Instant Noodle
Instant Pasta
Fabric Wash
Whole Pulses
Almond
Dryfruit
Masala
Flour
Dish wsh
Dish Wash
Paper products

*/

?>