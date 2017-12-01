<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tablacodigo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tablacodigo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vchCodigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchTexto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchDescripcion')->textInput(['maxlength' => true]) ?>

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
