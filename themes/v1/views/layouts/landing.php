<?php
/** Landing Page */

/* @var $this View */
/* @var $content string */

use app\assets\FontAsset;
use app\assets\LandingAsset;
use app\widgets\CarouselWidget;
use app\widgets\FooterWidget;
use app\widgets\NavbarWidget;
use yii\helpers\Html;
use app\components\View;

$this->title = $this->title . (empty($this->title) ? '' : ' - ') . Yii::$app->params['domain'];
$this->registerMetaTitle($this->title);

LandingAsset::register($this);
FontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--.preloader-->
<div class="preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
<!--/.preloader-->

<header id="home">
    <?= CarouselWidget::widget() ?>
    <?= NavbarWidget::widget() ?>
</header><!--/#home-->

<?= $content ?>

<?= FooterWidget::widget() ?>

<!--button back to top-->
<?=Html::a("<i class='fa fa-arrow-circle-up'></i>", '', ['style'=>'display:inline;', 'class'=>'back-to-top'])?>
<!--/.button back to top-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>