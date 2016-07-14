<?php

use yii\widgets\DetailView;
use app\helpers\DetailViewHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Portfolio */
?>
<div class="portfolio-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'url:url',
            'date:date',
            [
                'attribute' => 'picture',
                'value' => $model->getPictureHtml(['class'=>'img-responsive']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'client_id',
                'value' => $model->client ? $model->client->name : '',
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
