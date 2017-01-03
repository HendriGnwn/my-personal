<?php

use yii\widgets\DetailView;
use app\helpers\DetailViewHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MenuChild */
?>
<div class="menu-child-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'menu_id',
            'name',
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
