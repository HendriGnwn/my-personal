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
			<?= Html::a(Html::tag('h1', Yii::$app->name).Html::endTag('h1'), Url::home(), ['class'=>'navbar-brand', 'title'=>Yii::$app->name]) ?>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?= $data ?>
            </ul>
        </div>
    </div>
</div>