<?php

use app\widgets\AboutUsWidget;
use app\widgets\BlogWidget;
use app\widgets\ContactWidget;
use app\widgets\EducationWidget;
use app\widgets\EmployementWidget;
use app\widgets\PortfolioWidget;
use app\widgets\ServiceWidget;
use app\widgets\StatisticWidget;
use app\widgets\TestimonialWdiget;
use yii\web\View;

/* @var $this View */

$this->title = 'Web Developer';
?>

<?= ServiceWidget::widget() ?>

<?= AboutUsWidget::widget() ?>

<?= EmployementWidget::widget() ?>

<?= StatisticWidget::widget(); ?>

<?= PortfolioWidget::widget() ?>

<?//= EducationWidget::widget() ?>

<?//= TestimonialWdiget::widget() ?>

<?= BlogWidget::widget() ?>

<?= ContactWidget::widget(['model'=>$contactModel]) ?>