<?php

/* @var $this View */
/* @var $content string */

use app\assets\DefaultAsset;
use app\models\Menu;
use app\widgets\NavbarWidget;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

$this->title = $this->title . (!empty($this->title) ? ' | ' : '') . Yii::$app->name;

DefaultAsset::register($this);
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

<div class="wrap">
	
    <?=	NavbarWidget::widget(['category'=>  Menu::CATEGORY_BACKEND]) ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Home',
                'url' => ['@web/hen-admin'],
            ],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Hendri Gunawan <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
