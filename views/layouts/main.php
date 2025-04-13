<?php
/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? 'GreenThumb - Сообщество любителей растений']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? 'растения, садоводство, уход за растениями']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <title><?= Html::encode($this->title) ?> | GreenThumb</title>
        <?php $this->head() ?>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="fas fa-leaf"></i> GreenThumb',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-expand-lg navbar-dark fixed-top',
                'style' => 'background-color: var(--primary-green)'
            ],
            'innerContainerOptions' => ['class' => 'container']
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Каталог', 'url' => ['/plant/index'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Контакты', 'url' => ['/site/contact'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Кабинет', 'url' => ['/cabinet/index'], 'linkOptions' => ['class' => 'nav-link']],
                ['label' => 'Форум', 'url' => ['/forum/index'], 'linkOptions' => ['class' => 'nav-link']],
                Yii::$app->user->isGuest
                    ? ['label' => 'Войти', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'nav-link']]
                    : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'options' => ['class' => 'mb-4'],
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>'
                ]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; GreenThumb <?= date('Y') ?> | Сообщество любителей растений
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

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
        --leaf-pattern: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%2381c784" opacity="0.05"><path d="M30,15 Q50,0 70,15 Q90,30 85,50 Q80,70 60,85 Q40,100 30,85 Q20,70 25,50 Q30,30 30,15 Z"/></svg>');
    }
    .yii-debug-toolbar.yii-debug-toolbar_position_bottom{
        display: none!important;
    }
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--cream);
        color: #333;
        line-height: 1.6;
        background-image: var(--leaf-pattern);
        background-size: 200px;
    }

    .navbar {
        background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
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

    .btn-primary {
        background-color: var(--primary-green);
        border-color: var(--dark-green);
        font-weight: 600;
        letter-spacing: 0.5px;
        padding: 0.5rem 1.5rem;
    }

    .btn-primary:hover {
        background-color: var(--dark-green);
        transform: translateY(-2px);
    }

    #main {
        padding-top: 80px;
        padding-bottom: 40px;
    }

    .container {
        max-width: 1200px;
    }

    .breadcrumb {
        background-color: var(--lighter-green);
        border-radius: 6px;
        padding: 0.75rem 1.25rem;
    }

    footer {
        background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
        color: white;
        padding: 1.5rem 0;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
    }

    footer a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: color 0.2s;
    }

    footer a:hover {
        color: white;
    }

    .alert {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.4rem;
        }

        #main {
            padding-top: 70px;
        }
    }
</style>
