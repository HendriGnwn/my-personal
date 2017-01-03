<?php

use app\models\Education;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Education */
/* @var $form ActiveForm */
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Bio Profile
	</div>
	
	<div class="panel-body">

		<div class="bio-profile-form">

			<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'service_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'about_us_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'employement_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'portfolio_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'education_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'blog_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'contact_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>
			
			<?= $form->field($model, 'short_contact_description')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>

			<?= $form->field($model, 'metakey')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'metakey_en')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'metadesc')->textarea(['rows' => 6, 'maxlength'=>150]) ?>

			<?= $form->field($model, 'metadesc_en')->textarea(['rows' => 6, 'maxlength'=>150]) ?>

			<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

			<?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'bio')->widget(CKEditor::className(), [
				'options' => ['rows'=>6],
				'preset' => 'basic',
			]) ?>

			<?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'dribbble')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'linked_in')->textInput(['maxlength' => true]) ?>

		</div>
	</div>
	<?php if (!Yii::$app->request->isAjax){ ?>
		<div class="panel-footer">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	<?php } ?>
	<?php ActiveForm::end(); ?>
</div>