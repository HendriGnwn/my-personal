<?php

use app\helpers\Url;
use app\models\BioProfile;
use yii\helpers\Html;

/* @var $bioProfile BioProfile */

$bioProfile = Yii::$app->bioProfile->data;

?>
<footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container text-center">
            <div class="footer-logo">
                <?//= Html::a(Html::img($this->theme->getUrl('images/logo.png')), Url::home()) ?>
                <h2><?= Html::a(Yii::$app->name, Url::home()) ?></h2>
            </div>
            <div class="social-icons">
                <ul>
                    <li><?= Html::a("<i class=\"fa fa-envelope\"></i>", "mailto:{$bioProfile->email}?Subject=".Yii::$app->params['subjectMailto'], ['class'=>'envelope', 'target'=>'_top']) ?></li>
                    <li><?= Html::a("<i class=\"fa fa-twitter\"></i>", Url::to($bioProfile->twitter, true), ['class'=>'twitter', 'target'=>'_blank']) ?></li>
                    <li><?= Html::a("<i class=\"fa fa-dribbble\"></i>", Url::to($bioProfile->dribbble, true), ['class'=>'dribbble', 'target'=>'_blank']) ?></li>
                    <li><?= Html::a("<i class=\"fa fa-facebook\"></i>", Url::to($bioProfile->facebook, true), ['class'=>'facebook', 'target'=>'_blank']) ?></li>
                    <li><?= Html::a("<i class=\"fa fa-linkedin\"></i>", Url::to($bioProfile->linked_in, true), ['class'=>'linkedin', 'target'=>'_blank']) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>&copy; 2016 Oxygen Theme.</p>
                </div>
                <div class="col-sm-6">
                    <p class="pull-right">Crafted by <?= Html::a(Yii::$app->name, Yii::$app->params['mainDomain'], ['title'=>Yii::$app->name]) ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>