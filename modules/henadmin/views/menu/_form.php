<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php
    $selectOptions = ['data'=>Menu::categoryLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'category')->widget(Select2::className(), $selectOptions) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?php
    $selectOptions = ['data'=>Menu::statusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'status')->widget(Select2::className(), $selectOptions) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
