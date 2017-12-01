<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccesoBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acceso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'intIdAcceso') ?>

    <?= $form->field($model, 'vchToken') ?>

    <?= $form->field($model, 'intIdUsuario') ?>

    <?= $form->field($model, 'bitActivo')->checkbox() ?>

    <?= $form->field($model, 'dtiFechaInicio') ?>

    <?php // echo $form->field($model, 'dtiFechaFin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
