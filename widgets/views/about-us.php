<?php
/* @var $bioProfile app\models\BioProfile */
?>

<section id="about-us" class="parallax">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h2>About us</h2>
                    <?= $bioProfile->about_us_description ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					
					<?php 
						$dataWowDelay = 2;
						foreach($skill as $item) {
							$dataWowDelay++;
					?>
						<div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="<?= $dataWowDelay ?>00ms">
							<p class="lead"><?= $item->name ?></p>
							<div class="progress">
								<div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="<?= $item->statistic ?>"><?= $item->statistic ?>%</div>
							</div>
						</div>
					<?php } ?>
					
                </div>
            </div>
        </div>
    </div>
</section><!--/#about-us-->