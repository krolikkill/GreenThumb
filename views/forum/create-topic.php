<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="forum-form-container">
    <div class="form-header">
        <h2><i class="fas fa-plus-circle"></i> Создание новой темы</h2>
        <div class="header-divider"></div>
    </div>

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'forum-topic-form',
            'autocomplete' => 'off'
        ],
        'enableClientValidation' => true,
        'fieldConfig' => [
            'options' => ['class' => 'form-group'],
            'template' => "{input}\n{error}",
            'errorOptions' => ['class' => 'invalid-feedback']
        ]
    ]); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>
    <?= $form->field($model, 'category_id')->hiddenInput()->label(false) ?>

    <div class="form-floating mb-4">
        <?= $form->field($model, 'title')->textInput([
            'class' => 'form-control',
            'placeholder' => ' ',
            'id' => 'topicTitle'
        ]) ?>
        <label for="topicTitle" class="form-label">
            <i class="fas fa-heading me-2"></i>Название темы
        </label>
    </div>

    <div class="form-floating mb-4">
        <?= $form->field($model, 'content')->textarea([
            'class' => 'form-control',
            'placeholder' => ' ',
            'rows' => 8,
            'id' => 'topicContent',
            'style' => 'min-height: 200px;'
        ]) ?>
        <label for="topicContent" class="form-label">
            <i class="fas fa-align-left me-2"></i>Содержание темы
        </label>
    </div>

    <div class="form-footer">
        <?= Html::submitButton('<i class="fas fa-paper-plane me-2"></i> Опубликовать тему', [
            'class' => 'btn btn-primary btn-lg w-100 py-3',
            'name' => 'create-topic-button'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<style>
    .forum-form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.4s ease-out;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-header h2 {
        color: #2c3e50;
        font-weight: 600;
        font-size: 28px;
    }

    .header-divider {
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #4CAF50, #8BC34A);
        margin: 15px auto;
        border-radius: 3px;
    }

    .forum-topic-form .form-control {
        border-radius: 8px;
        padding: 15px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
    }

    .forum-topic-form .form-control:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
    }

    .form-floating {
        position: relative;
        margin-bottom: 25px;
    }

    .form-floating label {
        color: #7f8c8d;
        font-weight: 500;
        padding: 0 5px;
        background: white;
        left: 12px;
        top: -10px;
        position: absolute;
        font-size: 14px;
        height: 24px;
    }



    .btn-primary {
        background-color: #4CAF50;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        text-transform: uppercase;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #3d8b40;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
    }

    .invalid-feedback {
        display: block;
        margin-top: 8px;
        color: #e74c3c;
        font-size: 14px;
    }

    .is-invalid {
        border-color: #e74c3c !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

