<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TablacodigoBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tablacodigo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'intIdTablaCodigo') ?>

    <?= $form->field($model, 'vchCodigo') ?>

    <?= $form->field($model, 'vchTexto') ?>

    <?= $form->field($model, 'vchDescripcion') ?>

    <?= $form->field($model, 'bitActivo')->checkbox() ?>

    <?php // echo $form->field($model, 'intIdUsuarioReg') ?>

    <?php // echo $form->field($model, 'dtiFechaReg') ?>

    <?php // echo $form->field($model, 'intIdUsuarioUltMod') ?>

    <?php // echo $form->field($model, 'dtiFechaUltMod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
