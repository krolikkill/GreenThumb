<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Plant $model */

$this->title = 'Добавить растение';
$this->params['breadcrumbs'][] = ['label' => 'Plants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
