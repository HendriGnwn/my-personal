<?php

use yii\widgets\DetailView;
use app\helpers\DetailViewHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Education */
?>
<div class="education-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'url:url',
            'start_date:date',
            'end_date:date',
            [
                'attribute' => 'education_status',
                'value' => $model->getEducationStatusWithStyle(),
                'format'=>'raw',
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusWithStyle(),
                'format'=>'raw',
            ],
            'created_at:datetime',
            DetailViewHelper::author($model, 'created_by'),
            'updated_at:datetime',
            DetailViewHelper::author($model, 'updated_by'),
        ],
    ]) ?>

</div>
