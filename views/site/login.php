<?php
/** @var yii\web\View $this */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход в GreenThumb';
?>

<div class="site-login">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h1 class="text-center mb-4" style="color: var(--dark-green); font-family: 'Playfair Display', serif;">
                        <span class="leaf-logo"></span> Вход
                    </h1>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'options' => ['class' => 'mb-3'],
                            'inputOptions' => ['class' => 'form-control form-control-lg'],
                            'labelOptions' => ['class' => 'form-label']
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Ваш логин']) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Ваш пароль']) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"form-check\">{input} {label}</div>\n<div class=\"form-text\">{error}</div>",
                    ]) ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-lg px-5', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div class="text-center mt-4">
                        <p class="mb-2">Ещё нет аккаунта?</p>
                        <?= Html::a('Зарегистрироваться', ['/site/signup'], ['class' => 'btn btn-outline-success']) ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        background-color: white;
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

    .btn-outline-success {
        border-color: var(--primary-green);
        color: var(--primary-green);
    }

    .btn-outline-success:hover {
        background-color: var(--primary-green);
        color: white;
    }

    .form-check-input:checked {
        background-color: var(--primary-green);
        border-color: var(--primary-green);
    }
</style>