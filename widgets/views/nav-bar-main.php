<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="main-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=Url::home()?>">
                <h1><?=Html::img($this->theme->getUrl('images/logo.png'), ['alt'=>'Logo'])?></h1>
                <h1><?//=Yii::$app->name?></h1>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="scroll active"><?=Html::a('Home', '#home')?></li>
                <li class="scroll"><?=Html::a('Service', '#services')?></li>
                <li class="scroll"><?=Html::a('About Us', '#about-us')?></li>
                <li class="scroll"><?=Html::a('Employement', '#employement')?></li>
                <li class="scroll"><?=Html::a('Portfolio', '#portfolio')?></li>
                <li class="scroll"><?=Html::a('Blog', '#blog')?></li>
                <li class="scroll"><?=Html::a('Contact', '#contact')?></li>
            </ul>
        </div>
    </div>
</div>