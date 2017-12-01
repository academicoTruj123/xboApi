<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\usuarioclienteBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuariocliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'intIdUsucliente') ?>

    <?= $form->field($model, 'intIdUsuario') ?>

    <?= $form->field($model, 'vchNombres') ?>

    <?= $form->field($model, 'vchApellidoPaterno') ?>

    <?= $form->field($model, 'vchApellidoMaterno') ?>

    <?php // echo $form->field($model, 'intCodigoSexo') ?>

    <?php // echo $form->field($model, 'dtmFechaNacimiento') ?>

    <?php // echo $form->field($model, 'intIdUbigeo') ?>

    <?php // echo $form->field($model, 'vchDomicilioUbigeo') ?>

    <?php // echo $form->field($model, 'vchDomicilioDireccion') ?>

    <?php // echo $form->field($model, 'vchDomicilioReferencia') ?>

    <?php // echo $form->field($model, 'vchCelular') ?>

    <?php // echo $form->field($model, 'vchTelefonoFijo') ?>

    <?php // echo $form->field($model, 'dtiFechaAlta') ?>

    <?php // echo $form->field($model, 'dtiFechaBaja') ?>

    <?php // echo $form->field($model, 'intCodigoEstado') ?>

    <?php // echo $form->field($model, 'bitActivo')->checkbox() ?>

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
