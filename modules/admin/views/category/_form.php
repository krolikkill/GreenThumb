<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="category-form">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Название категории',
                        'class' => 'form-control form-control-lg'
                    ]) ?>
                </div>

            <div class="form-group mt-4">
                <?= Html::submitButton('Сохранить', [
                    'class' => 'btn btn-success btn-lg px-4'
                ]) ?>

                <?= Html::a('Отмена', ['index'], [
                    'class' => 'btn btn-outline-secondary btn-lg ms-2'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<style>
    .category-form .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }

    .category-form .form-control:focus {
        border-color: var(--light-green);
        box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
    }

    .category-form .btn-success {
        background-color: var(--primary-green);
        border-color: var(--dark-green);
        font-weight: 600;
        padding: 0.5rem 1.5rem;
    }

    .category-form .btn-success:hover {
        background-color: var(--dark-green);
        transform: translateY(-2px);
    }

    .category-form .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .category-form .card-header {
        font-family: 'Playfair Display', serif;
        border-radius: 0 !important;
    }
</style>