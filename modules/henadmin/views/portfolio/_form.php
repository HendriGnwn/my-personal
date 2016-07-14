<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use app\models\Portfolio;
use app\models\Client;
use yii\helpers\ArrayHelper;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php
    $dateOptions = ['options'=>['class'=>'form-control'], 'dateFormat' => 'php:Y-m-d'];
    ?>
    <?= $form->field($model, 'date')->widget(DatePicker::className(), $dateOptions); ?>

    <?= $form->field($model, 'pictureFile')->fileInput() ?>

    <?php
    $clients = ArrayHelper::map(Client::find()->where(['status'=>Client::STATUS_ACTIVE])->all(), 'id', 'name');
    $selectOptions = ['data'=>$clients, 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'client_id')->widget(Select2::className(), $selectOptions) ?>

    <?php
    $tags = ArrayHelper::map(Tag::find()->where(['status'=>Client::STATUS_ACTIVE])->all(), 'id', 'name');
    $selectOptions = ['data'=>$tags, 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--', 'multiple'=>true]];
    ?>
    <?= $form->field($model, 'inputTags')->widget(Select2::className(), $selectOptions) ?>

    <?php
    $selectOptions = ['data'=>Portfolio::statusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'status')->widget(Select2::className(), $selectOptions) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
