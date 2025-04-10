<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
?>

<div class="plant-view">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h1 class="card-title"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <?= Html::img(
                        $model->image
                            ? '@web/uploads/plants/' . $model->image
                            : '@web/images/no-image.jpg',
                        [
                            'class' => 'img-fluid rounded mb-4',
                            'alt' => $model->name,
                            'style' => 'max-height: 400px; width: 100%; object-fit: cover'
                        ]
                    ) ?>
                </div>

                <div class="col-md-7">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'category_id',
                                'value' => $model->category->name,
                                'label' => 'Категория'
                            ],
                            [
                                'attribute' => 'water_frequency',
                                'format' => 'html',
                                'value' => '<i class="fas fa-tint text-primary"></i> ' . $model->water_frequency
                            ],
                            [
                                'attribute' => 'light_requirements',
                                'format' => 'html',
                                'value' => '<i class="fas fa-sun text-warning"></i> ' . $model->light_requirements
                            ],
                            [
                                'attribute' => 'temperature_range',
                                'format' => 'html',
                                'value' => '<i class="fas fa-thermometer-half text-danger"></i> ' . $model->temperature_range
                            ],
                        ],
                        'options' => ['class' => 'table table-striped table-bordered detail-view'],
                    ]) ?>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Описание</h3>
                        </div>
                        <div class="card-body">
                            <?= nl2br(Html::encode($model->description)) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Советы по уходу</h3>
                        </div>
                        <div class="card-body">
                            <?= nl2br(Html::encode($model->care_guide)) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <?= Html::a('Назад к каталогу', ['index'], ['class' => 'btn btn-secondary']) ?>

            <?php if (Yii::$app->user->can('admin')): ?>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-end']) ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .plant-view .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .plant-view .card-header {
        border-radius: 10px 10px 0 0 !important;
    }

    .plant-view .detail-view th {
        width: 30%;
        background-color: #f8f9fa;
    }

    .plant-view .img-fluid {
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

</style>