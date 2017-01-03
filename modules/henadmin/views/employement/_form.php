<?php

use app\models\Employement;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;


/* @var $this View */
/* @var $model Employement */
/* @var $form ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
			'options' => ['rows'=>6],
			'preset' => 'advanced',
	]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php
    $startOptions = [
        'options'=>['class'=>'form-control'],
        'dateFormat' => 'php:Y-m-d',
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
            'onSelect' => new JsExpression('function(dateText, inst) { 
                     var minReturnDate = $("#employement-start_date").datepicker("getDate"),
                        $returnDate = $("#employement-end_date");
                     minReturnDate.setDate(minReturnDate.getDate() + 1);
            
                     $returnDate.datepicker("option", "minDate", minReturnDate); 
                }'
            ),
        ]
    ];
    ?>
    <?= $form->field($model, 'start_date')->widget(DatePicker::className(), $startOptions) ?>

    <?php
    $endOptions = [
        'options'=>['class'=>'form-control'],
        'dateFormat' => 'php: Y-m-d',
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
        ]
    ];
    ?>
    <?= $form->field($model, 'end_date')->widget(DatePicker::className(), $endOptions) ?>

    <?php
    $selectOptions = ['data'=>Employement::statusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'employement_status')->widget(Select2::className(), $selectOptions) ?>

    <?= $form->field($model, 'status')->widget(Select2::className(), $selectOptions) ?>
	
	<?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>