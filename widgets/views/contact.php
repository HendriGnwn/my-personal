<?php

use app\models\BioProfile;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/* @var $bioProfile BioProfile */

$bioProfile = Yii::$app->bioProfile->data;

?>

<section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="<?= $bioProfile->latitude ?>" data-longitude="<?= $bioProfile->longitude ?>" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
        <div class="container" id="contact-form">
            <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h2>Contact Us</h2>
                    <?= $bioProfile->contact_description ?>
                </div>
            </div>
            <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="row">
                    <div class="col-sm-6">
						<?php
							if(Yii::$app->session->hasFlash('contactFormSubmitted')) {
								echo \yii\bootstrap\Alert::widget([
									'options' => ['class' => 'alert-info'],
									'body' => Yii::$app->session->getFlash('contactFormSubmitted')
								]);
							}
						
							$form = ActiveForm::begin([
								'id' => 'main-contact-form',
								'fieldConfig' => [
									'template' => "<div class=\"group\">\n{input}<span class=\"highlight\"></span><span class=\"bar\"></span>\n{label}\n{error}</div>",
									'labelOptions' => ['class'=>null],
									'inputOptions' => ['class' => null, 'required' => true],
									'errorOptions' => ['style' => 'position:absolute !important;color:#fff !important;font-weight:normal !important;', 'class'=>'help-block help-block-error label label-danger'],
								]
							]);
						?>
						<?= $form->field($model, 'name')->textInput(['maxlength'=>true]) ?>
						<?= $form->field($model, 'email') ?>
						<?= $form->field($model, 'phone')->textInput(['maxlength'=>true]) ?>
						<?= $form->field($model, 'subject') ?>
						<?= $form->field($model, 'message')->textArea(['rows' => 6]) ?>
						<?= $form->field($model, 'verifyCode', ['template'=>'{input}{label}{error}</div></div></div>'])->widget(Captcha::className(), [
							'template' => "<div class=\"row\"><div class=\"col-xs-5 col-lg-3\">{image}</div><div class=\"col-xs-7 col-lg-9\"><div class=\"group\">\n{input}<span class=\"highlight\"></span><span class=\"bar\"></span>",
							'options' => ['class'=>null, 'required'=>true],
						]) ?>
						<div class="form-group">
							<?= Html::submitButton('Send Now', ['class' => 'btn-submit', 'name' => 'contact-button']) ?>
						</div>
						<?php ActiveForm::end(); ?>
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