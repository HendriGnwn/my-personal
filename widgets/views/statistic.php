<section id="statistic" class="parallax">
    <div class="container">
        <div class="row count">
			<?php
				if($items) {
					foreach($items as $item) { ?>
						<div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
							<?= $item->icon ?>
							<h3 class="timer"><?= $item->value ?></h3>
							<p><?= $item->name ?></p>
						</div>
			<?php	}
				} else { ?>
					<div class="col-sm-12 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
						<i class="fa fa-comment-o"></i>
						<h3>there is no content</h3
					</div>
			<?php } ?>
        </div>
    </div>
</section><!--/#statistic-->