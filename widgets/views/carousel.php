<?php

use yii\helpers\Html;

?>

<div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
		<?php
			$no = 1;
			foreach($carousels as $item) {
				$active = ($no==1) ? 'active' : '';
				$no++;
		?>
				<div class="item <?= $active ?>" style="background-image: url(<?=$item->getPictureUrl() ?>)">
					<div class="caption">
						<h1 class="animated fadeInLeftBig"><?= $item->name ?></h1>
						<p class="animated fadeInRightBig"><?= $item->short_description ?></p>
						<a data-scroll class="btn btn-start animated fadeInUpBig" href="<?= $item->url ?>">Start now</a>
					</div>
				</div>
		<?php } ?>
    </div>
    <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
    <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

    <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

</div><!--/#home-slider-->
