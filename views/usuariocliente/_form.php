<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\usuariocliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuariocliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'intIdUsuario')->textInput() ?>

    <?= $form->field($model, 'vchNombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchApellidoPaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchApellidoMaterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intCodigoSexo')->textInput() ?>

    <?= $form->field($model, 'dtmFechaNacimiento')->textInput() ?>

    <?= $form->field($model, 'intIdUbigeo')->textInput() ?>

    <?= $form->field($model, 'vchDomicilioUbigeo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchDomicilioDireccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchDomicilioReferencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchCelular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchTelefonoFijo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dtiFechaAlta')->textInput() ?>

    <?= $form->field($model, 'dtiFechaBaja')->textInput() ?>

    <?= $form->field($model, 'intCodigoEstado')->textInput() ?>

    <?= $form->field($model, 'bitActivo')->checkbox() ?>

    <?= $form->field($model, 'intIdUsuarioReg')->textInput() ?>

    <?= $form->field($model, 'dtiFechaReg')->textInput() ?>

    <?= $form->field($model, 'intIdUsuarioUltMod')->textInput() ?>

    <?= $form->field($model, 'dtiFechaUltMod')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
