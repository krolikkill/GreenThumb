<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

$this->params['breadcrumbs'][] = $this->title;

?>


<div class="plant-form">
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
                        'placeholder' => 'Название растения',
                        'class' => 'form-control form-control-lg'
                    ]) ?>

                    <?= $form->field($model, 'category_id')->dropDownList(
                        ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                        [
                            'prompt' => 'Выберите категорию',
                            'class' => 'form-select form-select-lg'
                        ]
                    ) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'image')->fileInput([
                        'class' => 'form-control form-control-lg',
                        'accept' => 'image/*'
                    ])->label('Изображение растения') ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'water_frequency')->textInput([
                        'placeholder' => 'Например: 1 раз в неделю',
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'light_requirements')->textInput([
                        'placeholder' => 'Например: Яркий рассеянный свет',
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'temperature_range')->textInput([
                        'placeholder' => 'Например: 18-25°C',
                        'class' => 'form-control'
                    ]) ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'description')->textarea([
                        'rows' => 3,
                        'placeholder' => 'Описание растения',
                        'class' => 'form-control'
                    ]) ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'care_guide')->textarea([
                        'rows' => 5,
                        'placeholder' => 'Подробное руководство по уходу...',
                        'class' => 'form-control'
                    ]) ?>
                </div>
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
    .plant-form .form-control,
    .plant-form .form-select {
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }

    .plant-form .form-control:focus,
    .plant-form .form-select:focus {
        border-color: var(--light-green);
        box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
    }

    .plant-form .btn-success {
        background-color: var(--primary-green);
        border-color: var(--dark-green);
        font-weight: 600;
        padding: 0.5rem 1.5rem;
    }

    .plant-form .btn-success:hover {
        background-color: var(--dark-green);
        transform: translateY(-2px);
    }

    .plant-form .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .plant-form .card-header {
        font-family: 'Playfair Display', serif;
        border-radius: 0 !important;
    }

    .plant-form textarea {
        min-height: 100px;
    }
</style>