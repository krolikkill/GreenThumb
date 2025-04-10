<h1>Мои растения</h1>

<?php foreach ($plants as $plant): ?>
    <div class="plant-card">
        <h3><?= Html::encode($plant->nickname) ?></h3>
        <p>Последний полив: <?= $plant->last_watered ? date('d.m.Y', strtotime($plant->last_watered)) : 'Никогда' ?></p>
        <?= Html::a('Добавить напоминание', ['add-reminder', 'plantId' => $plant->id], ['class' => 'btn btn-primary']) ?>
    </div>
<?php endforeach; ?>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
echo $form->field($model, 'type')->dropDownList([
    'water' => 'Полив',
    'fertilize' => 'Удобрение'
]);
echo $form->field($model, 'frequency_days')->input('number');
echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary']);
ActiveForm::end();
?>
<?php foreach ($plant->seasonalAdvice as $advice): ?>
<div class="alert alert-info">
    <strong>Сезонный совет:</strong> <?= Html::encode($advice->advice) ?>
</div>
<?php endforeach; ?>
