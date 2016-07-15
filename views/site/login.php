<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card wow bounceInLeft" data-wow-duration="1000ms" data-wow-delay="300ms"></div>

<div class="card wow bounceInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
	<h1 class="title">SIGN IN</h1>
	<?php $form = ActiveForm::begin([
        'id' => 'main-contact-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"input-container\">{input}\n{label}<div class=\"bar\"></div>\n{error}</div>",
            'labelOptions' => ['class' => null],
			'inputOptions' => ['class' => null, 'required' => true],
			'errorOptions' => ['style' => 'position:absolute !important;'],
        ],
    ]); ?>

		<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
	
		<?= $form->field($model, 'password')->passwordInput() ?>
		
		<div class="button-container wow rubberBand" data-wow-duration="1000ms" data-wow-delay="1000ms">
			<?= Html::submitButton('<span>SIGN IN</span>', ['name' => 'login-button']) ?>
		</div>
		<div class="footer"><a href="#">Forgot your password?</a></div>
	<?php ActiveForm::end(); ?>
 </div>