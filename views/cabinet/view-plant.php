<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
?>

<div class="cabinet-container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="plant-image text-center mb-3">
                        <?php
                        $imagePath = Yii::getAlias('@web/uploads/user-plants/') . $model->image;
                        $physicalPath = Yii::getAlias('@webroot/uploads/user-plants/') . $model->image;
                        ?>

                            <img src="<?= $imagePath ?>" class="img-fluid" alt="<?= Html::encode($model->name) ?>">
                    </div>

                    <h3><?= Html::encode($model->name) ?></h3>
                    <p><?= Html::encode($model->description) ?></p>

                    <hr>

                    <h5>Уход</h5>
                    <ul class="plant-care">
                        <?php if ($model->water_frequency): ?>
                            <li><strong>Полив:</strong> <?= Html::encode($model->water_frequency) ?></li>
                        <?php endif; ?>
                        <?php if ($model->light_requirements): ?>
                            <li><strong>Освещение:</strong> <?= Html::encode($model->light_requirements) ?></li>
                        <?php endif; ?>
                        <?php if ($model->temperature_range): ?>
                            <li><strong>Температура:</strong> <?= Html::encode($model->temperature_range) ?></li>
                        <?php endif; ?>
                    </ul>

                    <hr>

                    <h5>Мои заметки</h5>
                    <div class="plant-notes">
                        <?= $model->notes ? nl2br(Html::encode($model->notes)) : '<span class="text-muted">Нет заметок</span>' ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Журнал ухода</h4>
                    <a href="<?= Url::to(['add-care-log', 'plant_id' => $model->id]) ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Добавить запись
                    </a>
                </div>

                <?= ListView::widget([
                    'dataProvider' => $careLogDataProvider,
                    'itemView' => '_care-log-item',
                    'emptyText' => '<div class="alert alert-info">Журнал ухода пуст.</div>',
                    'layout' => "{items}\n{pager}",
                    'itemOptions' => ['class' => 'mb-3'],
                    'pager' => [
                        'options' => ['class' => 'pagination justify-content-center'],
                        'linkContainerOptions' => ['class' => 'page-item'],
                        'linkOptions' => ['class' => 'page-link'],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>