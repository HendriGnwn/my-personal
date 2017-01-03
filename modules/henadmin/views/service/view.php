<?php

use yii\widgets\DetailView;
use app\helpers\DetailViewHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
?>
<div class="service-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'slug',
            [
                'attribute' => 'icon',
                'value' => $model->getIconHtml(),
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusWithStyle(),
                'format' => 'raw',
            ],
            'created_at:datetime',
            DetailViewHelper::author($model, 'created_by'),
            'updated_at:datetime',
            DetailViewHelper::author($model, 'updated_by'),
        ],
    ]) ?>

</div>
