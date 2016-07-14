<?php
/** Landing Page */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\LandingAsset;
use app\assets\FontAsset;

$this->title = $this->title . (empty($this->title) ? '' : ' | ') . Yii::$app->name;

LandingAsset::register($this);
FontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--.preloader-->
<div class="preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
<!--/.preloader-->

<header id="home">
    <?= \app\widgets\CarouselWidget::widget() ?>
    <?= \app\widgets\NavbarWidget::widget() ?>
</header><!--/#home-->

<?= $content ?>

<?= \app\widgets\FooterWidget::widget() ?>

<!--button back to top-->
<?=Html::a("<i class='fa fa-arrow-circle-up'></i>", '', ['style'=>'display:inline;', 'class'=>'back-to-top'])?>
<!--/.button back to top-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>