<?php

/* @var $this yii\web\View */


$this->title = 'My Yii Application';

?>

<div class="site-index">

    <?php echo $this->render('//partials/banner_home', ['model' => $model]); ?>
    <?php echo $this->render('//partials/chat_order', ['model' => $model]); ?>

    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <?= $this->render('//partials/productbanner'); ?>
            </div>
            <div class="col-md-6">
                <?= $this->render('//partials/productbanner'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->render('//partials/searchbar'); ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <?PHP
            foreach ($productlist as $key => $val) :
                echo $this->render('//partials/productbox', ['val' => $val]);
            endforeach;
            ?>

        </div>

    </div>
</div>