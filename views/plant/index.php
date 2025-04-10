<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\grid\GridView;

$this->title = 'Каталог растений';
?>

<div class="plant-index">
    <div class="row">
        <div class="col-md-3">
            <!-- Фильтр по категориям -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Категории</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="<?= Url::to(['/plant/index']) ?>"
                       class="list-group-item list-group-item-action <?= !$selectedCategory ? 'active' : '' ?>">
                        Все растения
                    </a>
                    <?php foreach ($categories as $category): ?>
                        <a href="<?= Url::to(['/plant/index', 'category_id' => $category->id]) ?>"
                           class="list-group-item list-group-item-action <?= $selectedCategory == $category->id ? 'active' : '' ?>">
                            <?= Html::encode($category->name) ?>
                            <span class="badge bg-primary rounded-pill float-end">
                                <?= $category->getPlants()->count() ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

            <!-- Поиск (можно добавить позже) -->

            <div class="row">
                <?php foreach ($dataProvider->getModels() as $plant): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <?= Html::img($plant->image ? 'uploads/plants/' . $plant->image : '@web/images/no-image.jpg', [
                                'class' => 'card-img-top',
                                'alt' => $plant->name,
                                'style' => 'height: 200px; object-fit: cover'
                            ]) ?>

                            <div class="card-body">
                                <h5 class="card-title"><?= Html::encode($plant->name) ?></h5>
                                <span class="badge bg-success mb-2">
                                    <?= Html::encode($plant->category->name) ?>
                                </span>
                                <p class="card-text text-muted">
                                    <?= mb_substr(strip_tags($plant->description), 0, 100) ?>...
                                </p>
                            </div>

                            <div class="card-footer bg-transparent">
                                <?= Html::a('Подробнее', ['view', 'id' => $plant->id], [
                                    'class' => 'btn btn-outline-success btn-sm',
                                    'style' => 'border-radius: 20px; padding: 0.25rem 1rem;'
                                ]) ?>

                                <small class="text-muted float-end">
                                    <i class="fas fa-tint"></i> <?= $plant->water_frequency ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Пагинация -->
            <div class="row mt-4">
                <div class="col-12">
                    <?= LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'options' => ['class' => 'pagination justify-content-center'],
                        'linkContainerOptions' => ['class' => 'page-item'],
                        'linkOptions' => ['class' => 'page-link'],
                        'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link']
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(46, 125, 50, 0.15);
    }

    .badge.bg-success {
        background-color: var(--primary-green) !important;
    }

    .list-group-item.active {
        background-color: var(--primary-green);
        border-color: var(--primary-green);
    }

    .btn-outline-success {
        color: var(--primary-green);
        border-color: var(--primary-green);
    }

    .btn-outline-success:hover {
        background-color: var(--primary-green);
        color: white;
    }
</style>