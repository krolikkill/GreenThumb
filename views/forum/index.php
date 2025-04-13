<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="forum-main-container">
    <div class="forum-header">
        <h1><i class="fas fa-comments"></i> Форум GreenThumb</h1>
        <div class="header-divider"></div>
    </div>

    <div class="categories-grid">
        <?php foreach ($categories as $category): ?>
            <a href="<?= Url::to(['forum/category', 'id' => $category->id]) ?>" class="category-link">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div class="category-content">
                        <div class="category-header">
                            <h3><?= Html::encode($category->title) ?></h3>
                            <span class="topics-count">
                                <?= $category->getTopics()->count() ?> тема
                            </span>
                        </div>
                        <p class="category-description">
                            <?= Html::encode($category->description) ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .forum-main-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .forum-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .forum-header h1 {
        color: #2c3e50;
        font-weight: 600;
        font-size: 2.2rem;
    }

    .header-divider {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #4CAF50, #8BC34A);
        margin: 15px auto;
        border-radius: 4px;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 25px;
    }

    .category-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .category-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        padding: 25px;
        display: flex;
        align-items: flex-start;
        gap: 20px;
        transition: all 0.3s ease;
        height: 100%;
        border-left: 5px solid transparent;
    }

    .category-link:hover .category-card {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        border-left-color: #4CAF50;
    }

    .category-icon {
        font-size: 1.8rem;
        color: #4CAF50;
        background: #e8f5e9;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .category-content {
        flex-grow: 1;
    }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .category-header h3 {
        margin: 0;
        color: #2c3e50;
        font-size: 1.3rem;
        font-weight: 600;
    }

    .topics-count {
        background: #e8f5e9;
        color: #4CAF50;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .category-description {
        color: #7f8c8d;
        margin: 0;
        line-height: 1.5;
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .categories-grid {
            grid-template-columns: 1fr;
        }

        .category-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .category-header {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>