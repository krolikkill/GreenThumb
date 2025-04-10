<?php use yii\bootstrap5\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username')->textInput() ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'surname')->textInput() ?>
<?= $form->field($model, 'patronymic')->textInput() ?>

<?= $form->field($model, 'num_phone')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '+7 (999) (999)-99 99',
]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'password_repeat')->passwordInput() ?>

    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>

<?php \yii\bootstrap5\ActiveForm::end(); ?>