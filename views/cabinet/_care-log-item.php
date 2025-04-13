<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="care-log-item mb-3">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span class="badge
                    <?= match($model->care_type) {
                        'watering' => 'bg-primary',
                        'fertilizing' => 'bg-success',
                        'pruning' => 'bg-warning',
                        'transplanting' => 'bg-info',
                        default => 'bg-secondary'
                    } ?>">
                    <?= match($model->care_type) {
                        'watering' => 'Полив',
                        'fertilizing' => 'Удобрение',
                        'pruning' => 'Обрезка',
                        'transplanting' => 'Пересадка',
                        'treatment' => 'Обработка',
                        default => 'Другое'
                    } ?>
                </span>
                <small class="text-muted">
                    <?= Yii::$app->formatter->asDate($model->date) ?>
                </small>
            </div>
        </div>
        <div class="card-body">
            <?php if ($model->notes): ?>
                <p class="card-text"><?= nl2br(Html::encode($model->notes)) ?></p>
            <?php else: ?>
                <p class="text-muted">Нет дополнительных заметок</p>
            <?php endif; ?>

            <div class="care-log-actions mt-2">
                <?= Html::a('<i class="fas fa-edit"></i>',
                    ['update-care-log', 'id' => $model->id],
                    ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                <?= Html::a('<i class="fas fa-trash"></i>',
                    ['delete-care-log', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-outline-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                            'method' => 'post',
                        ],
                    ]) ?>
            </div>
        </div>
    </div>
</div>

<style>
.care-log-item .card {
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    margin-bottom: 10px;
}

.care-log-item .card-header {
    padding: 8px 15px;
    background-color: #f8f9fa;
}

.care-log-item .card-body {
    padding: 15px;
}

.care-log-actions {
    display: flex;
    gap: 5px;
    justify-content: flex-end;
}

.care-log-actions .btn {
    padding: 0.15rem 0.5rem;
    font-size: 0.8rem;
}
</style>