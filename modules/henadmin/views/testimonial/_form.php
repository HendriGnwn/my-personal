<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Testimonial;
use kartik\select2\Select2;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Testimonial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimonial-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
    $dateOptions = ['options'=>['class'=>'form-control'], 'dateFormat' => 'php:Y-m-d'];
    ?>
    <?= $form->field($model, 'date')->widget(DatePicker::className(), $dateOptions); ?>

    <?= $form->field($model, 'pictureFile')->fileInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php
    $selectOptions = ['data'=>Testimonial::statusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'status')->widget(Select2::className(), $selectOptions) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
