<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="cabinet-container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-edit"></i> Редактирование записи ухода</h4>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'care_type')->dropDownList([
                        'watering' => 'Полив',
                        'fertilizing' => 'Удобрение',
                        'pruning' => 'Обрезка',
                        'transplanting' => 'Пересадка',
                        'treatment' => 'Обработка',
                        'other' => 'Другое'
                    ]) ?>

                    <?= $form->field($model, 'date')->input('date') ?>

                    <?= $form->field($model, 'notes')->textarea(['rows' => 4]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Отмена', ['view-plant', 'id' => $model->user_plant_id], ['class' => 'btn btn-outline-secondary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>