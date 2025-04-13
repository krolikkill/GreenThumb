<?php
/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Контакты - GreenThumb Курган';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="contact-header">
    <div class="container">
        <h1 class="display-4 mb-4" style="color: var(--dark-green); font-family: 'Playfair Display', serif;">
            <i class="fas fa-leaf"></i>Контакты в Кургане
        </h1>
        <p class="lead" style="max-width: 700px; margin: 0 auto;">
            Садовый центр GreenThumb в Кургане - приходите за растениями, советами и хорошим настроением!
        </p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="contact-card">
                <i class="fas fa-leaf leaf-decoration" style="right: -30px; top: -30px;"></i>
                <div class="position-relative" style="z-index: 1;">
                    <div class="text-center mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-store-alt"></i>
                        </div>
                        <h2>Наш садовый центр</h2>
                        <p class="text-muted">Приходите за растениями и консультациями</p>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Адрес</h4>
                            <p>г. Курган, ул. Садовая, 15<br>(район Центрального рынка)</p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <h4>Телефоны</h4>
                            <p>+7 (3522) 12-34-56<br>+7 (912) 345-67-89 (WhatsApp)</p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Часы работы</h4>
                            <p>Пн-Пт: 9:00 - 19:00<br>Сб-Вс: 10:00 - 17:00</p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>kurgan@greenthumb.ru</p>
                        </div>
                    </div>

                    <div class="mt-4 pt-3">
                        <h4 class="mb-3">Мы в соцсетях</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-vk"></i></a>
                            <a href="#"><i class="fab fa-telegram-plane"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-odnoklassniki"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-4">
    <div class="container text-center">
        <h3 class="mb-4">Как добраться</h3>
        <p class="mb-4">Наш садовый центр находится в центре Кургана, рядом с Центральным рынком.<br>Остановка общественного транспорта "Центральный рынок".</p>
        <p>Ищите вывеску <strong>GreenThumb</strong> с логотипом в виде зеленого листа.</p>
    </div>
</div>

<?php $this->endBody() ?>

</body>
</html>
<style>
    :root {
        --primary-green: #2e7d32;
        --light-green: #81c784;
        --lighter-green: #e8f5e9;
        --dark-green: #1b5e20;
        --cream: #f9f9f5;
        --leaf-pattern: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%2381c784" opacity="0.05"><path d="M30,15 Q50,0 70,15 Q90,30 85,50 Q80,70 60,85 Q40,100 30,85 Q20,70 25,50 Q30,30 30,15 Z"/></svg>');
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--cream);
        color: #333;
        line-height: 1.6;
        background-image: var(--leaf-pattern);
        background-size: 200px;
    }

    .contact-header {
        background: linear-gradient(135deg, rgba(46,125,50,0.1), rgba(27,94,32,0.1));
        padding: 4rem 0;
        text-align: center;
        border-bottom: 1px solid rgba(129,199,132,0.3);
    }

    .contact-card {
        background: white;
        border-radius: 12px;
        padding: 2.5rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .leaf-decoration {
        position: absolute;
        opacity: 0.1;
        color: var(--primary-green);
        z-index: 0;
        font-size: 8rem;
    }

    .contact-icon {
        color: var(--primary-green);
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .contact-info {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .contact-info i {
        color: var(--primary-green);
        font-size: 1.2rem;
        margin-right: 1rem;
        margin-top: 0.2rem;
    }

    .btn-primary {
        background-color: var(--primary-green);
        border-color: var(--dark-green);
        font-weight: 600;
        padding: 0.7rem 2rem;
        border-radius: 50px;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background-color: var(--dark-green);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(46,125,50,0.3);
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--lighter-green);
        color: var(--primary-green);
        margin-right: 0.8rem;
        transition: all 0.3s;
    }

    .social-links a:hover {
        background: var(--primary-green);
        color: white;
        transform: translateY(-3px);
    }

    .form-control {
        border-radius: 8px;
        padding: 0.8rem 1rem;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: var(--light-green);
        box-shadow: 0 0 0 0.2rem rgba(129,199,132,0.25);
    }
</style>