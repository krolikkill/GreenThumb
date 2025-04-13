<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="cabinet-container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Добавить растение в коллекцию</h4>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'name')->textInput() ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

                    <?= $form->field($model, 'water_frequency')->textInput() ?>

                    <?= $form->field($model, 'light_requirements')->textInput() ?>

                    <?= $form->field($model, 'temperature_range')->textInput() ?>

                    <?= $form->field($model, 'image')->fileInput() ?>

                    <?= $form->field($model, 'notes')->textarea(['rows' => 3]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>