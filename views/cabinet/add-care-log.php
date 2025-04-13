<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
    <div class="cabinet-container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <i class="fas fa-clipboard-list"></i>
                            Добавить запись в журнал ухода
                        </h4>
                        <div class="plant-info-badge">
                            Растение: <?= Html::encode($userPlant->name) ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php $form = ActiveForm::begin(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'care_type')->dropDownList([
                                    'watering' => 'Полив',
                                    'fertilizing' => 'Удобрение',
                                    'pruning' => 'Обрезка',
                                    'transplanting' => 'Пересадка',
                                    'treatment' => 'Обработка',
                                    'other' => 'Другое'
                                ], ['prompt' => 'Выберите тип ухода']) ?>
                            </div>

                            <?= $form->field($model, 'date')->input('date', [
                                'class' => 'form-control',
                                'value' => date('Y-m-d'), // Установка текущей даты по умолчанию
                            ]) ?>
                        </div>

                        <?= $form->field($model, 'notes')->textarea(['rows' => 4]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Добавить запись', ['class' => 'btn btn-success']) ?>
                            <?= Html::a('Отмена', ['view-plant', 'id' => $userPlant->id], ['class' => 'btn btn-outline-secondary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .cabinet-container {
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h4 {
            margin: 0;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        .plant-info-badge {
            background: #e8f5e9;
            color: #4CAF50;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-outline-secondary {
            margin-left: 10px;
        }
    </style>

<?php
$this->registerJs("
    // Устанавливаем текущую дату по умолчанию
    $('#plantcarelog-date').val(new Date().toISOString().split('T')[0]);
");
?>