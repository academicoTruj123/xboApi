<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Acceso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acceso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vchToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intIdUsuario')->textInput() ?>

    <?= $form->field($model, 'bitActivo')->checkbox() ?>

    <?= $form->field($model, 'dtiFechaInicio')->textInput() ?>

    <?= $form->field($model, 'dtiFechaFin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
