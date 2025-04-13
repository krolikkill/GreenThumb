<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="plant-card">
    <a href="<?= Url::to(['view-plant', 'id' => $model->id]) ?>">
        <?= Html::img($model->image ? 'uploads/user-plants/' . $model->image : '@web/images/no-image.jpg', [
            'class' => 'card-img-top',
            'alt' => $model->name,
            'style' => 'height: 200px; object-fit: cover'
        ]) ?>
        <div class="plant-info">
            <h5><?= Html::encode($model->name) ?></h5>
            <small class="text-muted">
                Добавлено: <?= Yii::$app->formatter->asDate($model->created_at) ?>
            </small>
        </div>
    </a>
</div>