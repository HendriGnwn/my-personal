<?php
/* @var $bioProfile app\models\BioProfile */
?>

<section id="employement">
    <div class="container">
        <div class="row">
            <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                <h2>Employement</h2>
                <?= $bioProfile->employement_description ?>
            </div>
        </div>
        <div class="pricing-table">
            <div class="row">
				<?php
					foreach($employements as $item) {
						$classFeatured = ($item->isActiveEmployementStatus()) ? 'featured' : '';
				?>
					<div class="col-sm-6">
						<div class="single-table <?= $classFeatured ?> wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
							<h3><?= $item->getDateRange() ?></h3>
							<div class="price">
								<?= $item->name ?>
							</div>
							<?php if($item->isCompany()) { ?>
							<div class="price">
								<span><?= $item->company ?></span>
							</div>
							<?php } ?>
							<ul>
								<?= $item->description ?>
							</ul>
						</div>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
</section><!--/#employement-->