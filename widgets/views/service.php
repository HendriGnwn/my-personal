<?php
/* @var $bioProfile app\models\BioProfile */
?>

<section id="services">
    <div class="container">
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                <div class="text-center col-sm-8 col-sm-offset-2">
                    <h2>Our Services</h2>
                    <?= $bioProfile->service_description ?>
                </div>
            </div>
        </div>
        <div class="text-center our-services">
            <div class="row">
				<?php foreach($services as $item) { ?>
					<div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
						<div class="service-icon">
							<?= $item->icon ?>
						</div>
						<div class="service-info">
							<h3><?= $item->name ?></h3>
							<p><?= $item->description ?></p>
						</div>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
</section><!--/#services-->