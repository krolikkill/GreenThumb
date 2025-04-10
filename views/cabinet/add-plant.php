<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
echo $form->field($model, 'nickname')->textInput();
echo $form->field($model, 'plant_id')->textInput()->hint('ID растения из каталога');
echo $form->field($model, 'purchase_date')->input('date');
echo Html::submitButton('Добавить', ['class' => 'btn btn-success']);
ActiveForm::end();