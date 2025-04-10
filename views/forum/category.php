<?php

use yii\helpers\Html;

?>
<div class="mb-4">
    <?= Html::a('<i class="fas fa-plus"></i> Новая тема',
        ['forum-topic/create', 'category_id' => $category->id],
        ['class' => 'btn btn-success']
    ) ?>
</div>