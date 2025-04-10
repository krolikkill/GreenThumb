<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Создание новой темы';
$this->params['breadcrumbs'][] = ['label' => 'Форум', 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => $category->title, 'url' => ['forum/category', 'id' => $category->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="forum-topic-create">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2 class="card-title mb-0"><?= Html::encode($this->title) ?></h2>
            <small>Категория: <?= Html::encode($category->title) ?></small>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput([
                'maxlength' => true,
                'placeholder' => 'Введите название темы'
            ]) ?>

            <?= $form->field($model, 'content')->textarea([
                'rows' => 10,
                'placeholder' => 'Подробно опишите вашу тему...'
            ])->label('Содержание') ?>

            <div class="form-group mt-4">
                <?= Html::submitButton('Создать тему', [
                    'class' => 'btn btn-success btn-lg'
                ]) ?>

                <?= Html::a('Отмена', ['forum/category', 'id' => $category->id], [
                    'class' => 'btn btn-outline-secondary btn-lg ml-2'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<style>
    .forum-topic-create .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

    .forum-topic-create textarea {
        min-height: 200px;
        resize: vertical;
    }

    .forum-topic-create .btn-success {
        padding: 0.5rem 2rem;
        font-size: 1.1rem;
    }
</style>