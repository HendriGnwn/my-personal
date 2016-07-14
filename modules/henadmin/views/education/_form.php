<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use app\models\Education;


/* @var $this yii\web\View */
/* @var $model app\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php
    $startOptions = [
        'options'=>['class'=>'form-control'],
        'dateFormat' => 'php:Y-m-d',
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
            'onSelect' => new \yii\web\JsExpression('function(dateText, inst) { 
                     var minReturnDate = $("#education-start_date").datepicker("getDate"),
                        $returnDate = $("#education-end_date");
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
        'dateFormat' => 'php:Y-m-d',
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
        ]
    ];
    ?>
    <?= $form->field($model, 'end_date')->widget(DatePicker::className(), $endOptions) ?>

    <?php
    $selectOptions = ['data'=>Education::educationStatusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'education_status')->widget(Select2::className(), $selectOptions) ?>

    <?php
    $selectOptions = ['data'=>Education::statusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'status')->widget(Select2::className(), $selectOptions) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>