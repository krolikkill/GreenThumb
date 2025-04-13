<?php
/* @var $this yii\web\View */


use yii\helpers\Html;

$this->title = 'GreenThumb - Советы для садоводов';
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
            padding-top: 0;
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

        .hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 4rem 0;
            background: linear-gradient(rgba(249, 249, 245, 0.9), rgba(249, 249, 245, 0.9)), var(--leaf-pattern);
        }

        .plant-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: white;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .plant-card img {
            height: 200px;
            object-fit: cover;
        }

        .plant-card .card-body {
            padding: 1.5rem;
        }

        .season-section {
            background-color: var(--lighter-green);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 mb-4" style="color: var(--dark-green); font-family: 'Playfair Display', serif;">
                    <i class="fas fa-leaf"></i>GreenThumb
                </h1>
                <p class="lead mb-5">
                    Ваш персональный гид в мире садоводства. Советы, рекомендации и секреты выращивания растений от опытных садоводов.
                </p>
                <div class="d-flex justify-content-center gap-3">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="h1 mb-4" style="color: var(--dark-green);">Растения месяца</h2>
            <p class="lead">Лучшие варианты для вашего сада в этом сезоне</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="plant-card shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1526397751294-331021109fbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Томаты">
                <div class="card-body">
                    <h3 class="h5">Томаты</h3>
                    <p>Секреты выращивания сочных и сладких томатов в вашем огороде.</p>
                    <?= Html::a('Подробнее', ['/plants/tomatoes'], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                </div>
            </div>
        </div><div class="col-md-4 mb-4">
            <div class="plant-card shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1526397751294-331021109fbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Томаты">
                <div class="card-body">
                    <h3 class="h5">Томаты</h3>
                    <p>Секреты выращивания сочных и сладких томатов в вашем огороде.</p>
                    <?= Html::a('Подробнее', ['/plants/tomatoes'], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                </div>
            </div>
        </div><div class="col-md-4 mb-4">
            <div class="plant-card shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1526397751294-331021109fbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Томаты">
                <div class="card-body">
                    <h3 class="h5">Томаты</h3>
                    <p>Секреты выращивания сочных и сладких томатов в вашем огороде.</p>
                    <?= Html::a('Подробнее', [''], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                </div>
            </div>
        </div>




    </div>
</div>

<div class="bg-light py-5">
    <div class="container">
        <div class="season-section">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="mb-4">Сезонные работы</h2>
                    <p class="mb-4">Узнайте, какие работы нужно провести в саду в этом месяце, чтобы получить лучший результат.</p>
                    <?= Html::a('Календарь садовода', [''], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-lg" alt="Сезонные работы">
                </div>
            </div>
        </div>

        <div class="row text-center mt-5">
            <div class="col-md-4 mb-5">
                <div class="feature-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="h4 mb-3">База знаний</h3>
                <p>Более 500 статей по уходу за растениями, борьбе с вредителями и улучшению почвы.</p>
            </div>

            <div class="col-md-4 mb-5">
                <div class="feature-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="h4 mb-3">Персональный календарь</h3>
                <p>Напоминания о важных садовых работах, адаптированные под ваш регион.</p>
            </div>

            <div class="col-md-4 mb-5">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="h4 mb-3">Сообщество</h3>
                <p>Общайтесь с другими садоводами, делитесь опытом и задавайте вопросы.</p>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>