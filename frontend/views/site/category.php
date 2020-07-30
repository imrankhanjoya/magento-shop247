<?php

/* @var $this yii\web\View */


$this->title = 'My Yii Application';

?>

<div class="site-index">


    <div class="body-content">


        <div class="row">
            <?PHP
            foreach ($productlist as $key => $val) :
                echo $this->render('//partials/productbox', ['val' => $val]);
            endforeach;
            ?>

        </div>

    </div>
</div>