<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="forum-category-container">
    <div class="category-header">
        <h2 class="category-title">
            <i class="fas fa-list me-2"></i><?= Html::encode($category->title) ?>
        </h2>
        <?php if (!Yii::$app->user->isGuest): ?>
            <a href="<?= Url::to(['forum/create-topic', 'category_id' => $category->id]) ?>"
               class="btn btn-new-topic">
                <i class="fas fa-plus me-1"></i>Новая тема
            </a>
        <?php endif; ?>
    </div>

    <div class="topics-list">
        <?php foreach ($topics as $topic): ?>
            <a href="<?= Url::to(['forum/topic', 'id' => $topic->id]) ?>" class="topic-link">
                <div class="topic-item">
                    <div class="topic-main">
                        <h3 class="topic-title">
                            <?= Html::encode($topic->title) ?>
                        </h3>
                        <div class="topic-meta">
                            <span class="topic-author">
                                <i class="fas fa-user"></i> <?= Html::encode($topic->user->username) ?>
                            </span>
                            <span class="topic-date">
                                <i class="fas fa-clock"></i> <?= Yii::$app->formatter->asRelativeTime($topic->created_at) ?>
                            </span>
                        </div>
                    </div>
                    <div class="topic-stats">
                        <span class="comments-count">
                            <i class="fas fa-comment"></i> <?= $topic->getPosts()->count() ?>
                        </span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if (Yii::$app->user->isGuest): ?>
        <div class="guest-notice">
            <div class="notice-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="notice-content">
                Чтобы создавать новые темы, пожалуйста
                <a href="<?= Url::to(['site/login']) ?>">войдите</a> или
                <a href="<?= Url::to(['site/signup']) ?>">зарегистрируйтесь</a>.
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .forum-category-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 25px;
        margin-bottom: 30px;
    }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
    }

    .category-title {
        color: #2c3e50;
        font-weight: 600;
        margin: 0;
        font-size: 1.8rem;
    }

    .btn-new-topic {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .btn-new-topic:hover {
        background-color: #3d8b40;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(76, 175, 80, 0.3);
    }

    .topics-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .topic-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .topic-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .topic-link:hover .topic-item {
        background: #f1f8ff;
        border-left-color: #4CAF50;
        transform: translateX(5px);
    }

    .topic-main {
        flex: 1;
    }

    .topic-title {
        margin: 0 0 8px 0;
        font-size: 1.2rem;
        color: #2c3e50;
    }

    .topic-meta {
        display: flex;
        gap: 15px;
        font-size: 0.9rem;
        color: #7f8c8d;
    }

    .topic-meta i {
        margin-right: 5px;
    }

    .topic-stats {
        display: flex;
        gap: 15px;
    }

    .comments-count {
        background: #e8f5e9;
        color: #4CAF50;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .guest-notice {
        display: flex;
        align-items: center;
        background: #e3f2fd;
        padding: 15px;
        border-radius: 8px;
        margin-top: 25px;
        gap: 15px;
    }

    .notice-icon {
        color: #1976d2;
        font-size: 1.5rem;
    }

    .notice-content {
        color: #455a64;
    }

    .notice-content a {
        color: #1976d2;
        font-weight: 500;
        text-decoration: none;
    }

    .notice-content a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .category-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .topic-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .topic-stats {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>