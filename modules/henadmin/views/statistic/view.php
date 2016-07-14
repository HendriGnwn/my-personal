<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Statistic */
?>
<div class="statistic-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'icon',
            'value',
            'order',
            'status',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
