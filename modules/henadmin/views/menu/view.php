<?php

use yii\widgets\DetailView;
use app\helpers\DetailViewHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
?>
<div class="menu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'url:url',
            'category',
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
