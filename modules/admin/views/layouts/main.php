<?php
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->beginPage();
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> | Админ-панель GreenThumb</title>
        <?php $this->head() ?>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </head>
    <body>
    <?php $this->beginBody() ?>

    <!-- Навбар админки -->
    <?php
    NavBar::begin([
        'brandLabel' => '<i class="fas fa-leaf"></i> GreenThumb Admin',
        'brandUrl' => ['/admin'],
        'options' => ['class' => 'navbar-expand-lg navbar-dark admin-navbar'],
        'innerContainerOptions' => ['class' => 'container-fluid']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto'],
        'items' => [
            ['label' => 'Растения', 'url' => ['/admin/plant/index'], 'linkOptions' => ['class' => 'nav-link']],
            ['label' => 'Категории', 'url' => ['/admin/category/index'], 'linkOptions' => ['class' => 'nav-link']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'nav-link']]
            ) : (
                '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link nav-link btn-logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <!-- Контент админки -->
    <div class="container-fluid admin-container">
        <?= $content ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
<style>
    :root {
        --primary-green: #2e7d32;
        --light-green: #81c784;
        --lighter-green: #e8f5e9;
        --dark-green: #1b5e20;
        --cream: #f9f9f5;
        --admin-dark: #1a3e1e;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--cream);
        color: #333;
        line-height: 1.6;
    }

    .admin-navbar {
        background: linear-gradient(135deg, var(--admin-dark), var(--dark-green));
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        padding: 0.8rem 1rem;
    }

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: white !important;
        display: flex;
        align-items: center;
    }

    .navbar-brand i {
        margin-right: 10px;
        font-size: 1.5rem;
    }

    .nav-link {
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        margin: 0 0.2rem;
        border-radius: 4px;
        transition: all 0.3s;
    }

    .nav-link:hover {
        background-color: rgba(255,255,255,0.15);
    }

    .btn-logout {
        color: rgba(255,255,255,0.75) !important;
        padding: 0.5rem 1rem !important;
    }

    .btn-logout:hover {
        color: white !important;
        text-decoration: none;
    }

    .admin-container {
        padding-top: 80px;
        padding-bottom: 40px;
        max-width: 1400px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: var(--light-green);
        color: white;
        font-weight: 600;
        border-radius: 10px 10px 0 0 !important;
    }

    .table th {
        background-color: var(--lighter-green);
    }

    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.4rem;
        }

        .admin-container {
            padding-top: 70px;
        }
    }
</style>
