<?php

use yii\widgets\DetailView;
use app\helpers\DetailViewHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Carousel */
?>
<div class="carousel-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'short_description',
            [
                'attribute' => 'picture',
                'value' => $model->getPictureHtml(['class'=>'img-responsive']),
                'format' => 'raw',
            ],
            'url:url',
            'order',
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
