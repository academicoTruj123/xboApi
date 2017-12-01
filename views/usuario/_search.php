<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'intIdUsuario') ?>

    <?= $form->field($model, 'vchCorreo') ?>

    <?= $form->field($model, 'vchClave') ?>

    <?= $form->field($model, 'vchAuthKey') ?>

    <?= $form->field($model, 'vchCodVerificacion') ?>

    <?php // echo $form->field($model, 'intCodigoEstado') ?>

    <?php // echo $form->field($model, 'dtiFechaAlta') ?>

    <?php // echo $form->field($model, 'dtiFechaBaja') ?>

    <?php // echo $form->field($model, 'bitActivo')->checkbox() ?>

    <?php // echo $form->field($model, 'dtiFechaReg') ?>

    <?php // echo $form->field($model, 'dtiFechaUltMod') ?>

    <?php // echo $form->field($model, 'intTipoLogin') ?>

    <?php // echo $form->field($model, 'intCodigoRol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
