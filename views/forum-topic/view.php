<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $topic->title;
$this->params['breadcrumbs'][] = ['label' => 'Форум', 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => $topic->category->title, 'url' => ['forum/category', 'id' => $topic->category->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="forum-topic-view">
    <div class="card mb-4">
        <div class="card-header bg-light">
            <h2><?= Html::encode($topic->title) ?></h2>
            <small class="text-muted">
                Автор: <?= Html::encode($topic->user->username) ?> |
                Создано: <?= Yii::$app->formatter->asDatetime($topic->created_at) ?> |
                Просмотров: <?= $topic->views_count ?>
            </small>
        </div>
        <div class="card-body">
            <div class="topic-content mb-4 p-3 bg-light rounded">
                <?= nl2br(Html::encode($topic->content)) ?>
            </div>

            <h3>Ответы</h3>

            <div class="posts-list">
                <?php foreach ($posts as $post): ?>
                    <div class="card mb-3" id="post-<?= $post->id ?>">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong><?= Html::encode($post->user->username) ?></strong>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        <?= Yii::$app->formatter->asDatetime($post->created_at) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= nl2br(Html::encode($post->content)) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (!Yii::$app->user->isGuest): ?>
                <div class="reply-form mt-5">
                    <h4>Оставить ответ</h4>
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($newPost, 'content')->textarea(['rows' => 5])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info mt-4">
                    Чтобы оставить ответ, пожалуйста <?= Html::a('войдите', ['site/login']) ?> или <?= Html::a('зарегистрируйтесь', ['site/signup']) ?>.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
$this->registerJs(<<<JS
$(document).on('beforeSubmit', '#post-form', function() {
    var form = $(this);
    $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(response) {
            if (response.success) {
                location.reload();
            }
        }
    });
    return false;
});
JS
);
?>