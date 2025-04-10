<?php
use yii\helpers\Html;

$this->title = 'Форум';

?>

<div class="forum-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($categories as $category): ?>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h3 class="card-title mb-0">
                    <?= Html::a(Html::encode($category->title), ['category', 'id' => $category->id], ['class' => 'text-white']) ?>
                </h3>
            </div>
            <div class="card-body">
                <p class="card-text"><?= Html::encode($category->description) ?></p>

                <?php if (!empty($category->topics)): ?>
                    <div class="list-group mt-3">
                        <?php foreach ($category->topics as $topic): ?>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <?= Html::a(Html::encode($topic->title), ['forum-topic/view', 'id' => $topic->id]) ?>
                                        <small class="text-muted">
                                            Автор: <?= Html::encode($topic->user->username) ?>
                                        </small>
                                    </div>
                                    <div>
                                        <small class="text-muted">
                                            <?= Yii::$app->formatter->asRelativeTime($topic->updated_at) ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


        </div>

            </div>

            <?php else: ?>
                <p class="text-muted">Пока нет тем для обсуждения</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <div class="card-footer">
        <?= Html::a('Создать тему', ['forum-topic/create', 'category_id' => $category->id], ['class' => 'btn btn-success']) ?>
    </div>
</div>
