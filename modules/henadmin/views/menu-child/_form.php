<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\MenuChild;
use app\models\Menu;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MenuChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $data = ArrayHelper::map(Menu::find()->where(['status'=>Menu::STATUS_ACTIVE])->all(), 'id', 'name');
    $selectOptions = ['data'=>$data, 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'menu_id')->widget(Select2::className(), $selectOptions) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?php
    $selectOptions = ['data'=>MenuChild::statusLabels(), 'pluginOptions'=>['allowClear'=>true], 'options'=>['prompt'=>'--Choose One--']];
    ?>
    <?= $form->field($model, 'status')->widget(Select2::className(), $selectOptions) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
