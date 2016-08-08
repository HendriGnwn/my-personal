<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
?>
<div class="setting-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'value:ntext',
            'active',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
