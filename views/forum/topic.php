<?php
use app\models\ForumPost;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="forum-container">

    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><?= $topic->title ?></h3>

            </div>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="post-avatar me-3">
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between mb-2">
                        <strong><?= $topic->user->username ?></strong>
                        <small class="text-muted"><?php echo Yii::$app->formatter->asRelativeTime($topic->created_at) ?></small>
                    </div>
                    <p class="card-text"><?= nl2br(Html::encode($topic->content)) ?></p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3"><i class="fas fa-comments me-2"></i>Ответы (<?= count($posts) ?>)</h4>

    <?php foreach ($posts as $post): ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex">
                    <div class="post-avatar me-3">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between mb-2">
                            <strong>Ответил: <?= $post->user->username ?></strong>
                            <small class="text-muted"><?php echo Yii::$app->formatter->asRelativeTime($post->created_at) ?></small>
                        </div>
                        <p class="card-text"><?= nl2br(Html::encode($post->content)) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="card mt-4">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="fas fa-reply me-2"></i>Ответить</h5>
        </div>
        <div class="card-body">
            <?php if (Yii::$app->user->isGuest): ?>
                <div class="alert alert-info">
                    Чтобы оставить комментарий, пожалуйста <a href="<?= \yii\helpers\Url::to(['site/login']) ?>">авторизуйтесь</a>.
                </div>
            <?php else: ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'post-form',
                    'enableAjaxValidation' => true,
                    'validationUrl' => ['forum/validate-post'],
                    'options' => ['class' => 'form-comment']
                ]); ?>

                <?= $form->field($model, 'content')->textarea([
                    'rows' => 5,
                    'class' => 'form-control',
                    'placeholder' => 'Напишите ваш комментарий...'
                ])->label(false) ?>

                <?= $form->field($model, 'topic_id')->hiddenInput(['value' => $topic->id])->label(false) ?>
                <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', [
                        'class' => 'btn btn-success',
                        'name' => 'submit-button'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            <?php endif; ?>
        </div>
    </div>
</div>