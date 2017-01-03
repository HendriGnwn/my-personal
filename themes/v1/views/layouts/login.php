<?php
/** Login Page */

/* @var $this View */
/* @var $content string */

use app\assets\FontAsset;
use app\assets\LoginAsset;
use app\components\View;
use yii\helpers\Html;

$this->title = $this->title . (empty($this->title) ? '' : ' - ') . Yii::$app->params['domain'];
$this->registerMetaTitle($this->title);

LoginAsset::register($this);
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
<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
<!--/.preloader-->

<header id="home">
    <div class="pen-title wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
		<h1><?=Yii::$app->name?></h1><span>Please Login to sign in to the administrator page</span>
	</div>
</header><!--/#home-->

<div class="container parallax">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>