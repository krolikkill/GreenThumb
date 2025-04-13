<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>

<div class="cabinet-container">
    <div class="row">
        <div class="col-md-3">
            <div class="card profile-card">
                <div class="card-body text-center">
                    <div class="profile-avatar">
                    </div>
                    <h4><?= Html::encode(Yii::$app->user->identity->username) ?></h4>
                    <p class="text-muted">Участник
                        с <?= Yii::$app->formatter->asDate(Yii::$app->user->identity->created_at) ?></p>


                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Мои растения</h4>
                    <a href="<?= Url::to(['add-plant']) ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Добавить растение
                    </a>
                </div>

                <div class="card-body">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_plant-item',
                        'emptyText' => '<div class="alert alert-info">У вас пока нет растений в коллекции. <a href="' . Url::to(['add-plant']) . '">Добавьте первое растение</a>.</div>',
                        'layout' => "{items}\n{pager}",
                        'options' => ['class' => 'row'],
                        'itemOptions' => ['class' => 'col-md-4 mb-4'],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>