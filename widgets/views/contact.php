<?php

use app\models\BioProfile;
use yii\helpers\Html;

/* @var $bioProfile BioProfile */

$bioProfile = Yii::$app->bioProfile->data;

?>

<section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="<?= $bioProfile->latitude ?>" data-longitude="<?= $bioProfile->longitude ?>" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
        <div class="container">
            <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h2>Contact Us</h2>
                    <?= $bioProfile->contact_description ?>
                </div>
            </div>
            <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="row">
                    <div class="col-sm-6">
                        <form id="main-contact-form" name="contact-form" method="post" action="#">
                            <div class="group">
                                <input required type="text"><span class="highlight"></span><span class="bar"></span><label>Name</label>
                            </div>
                            <div class="group">
                                <input required="" type="email"><span class="highlight"></span><span class="bar"></span><label>Email</label>
                            </div>
                            <div class="group">
                                <textarea required=""></textarea><span class="highlight"></span><span class="bar"></span><label>Message</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-submit">Send Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <?= $bioProfile->short_contact_description ?>
                            <ul class="address">
                                <li><i class="fa fa-map-marker"></i> <u> Address:</u> <?= $bioProfile->address ?> </li>
                                <li><i class="fa fa-phone"></i> <u> Phone:</u> <?= $bioProfile->phone ?>  </li>
							<li><i class="fa fa-envelope"></i> <u> Email:</u> <?= Html::a($bioProfile->email, "mailto:{$bioProfile->email}?Subject=".Yii::$app->params['subjectMailto'], ['target'=>'_top']) ?></li>
                                <li><i class="fa fa-globe"></i> <u> Website:</u> <?= Html::a($bioProfile->website, $bioProfile->website, ['target'=>'_top']) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#contact-->