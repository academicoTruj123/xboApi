<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vchCorreo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchClave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchAuthKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchCodVerificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intCodigoEstado')->textInput() ?>

    <?= $form->field($model, 'dtiFechaAlta')->textInput() ?>

    <?= $form->field($model, 'dtiFechaBaja')->textInput() ?>

    <?= $form->field($model, 'bitActivo')->checkbox() ?>

    <?= $form->field($model, 'dtiFechaReg')->textInput() ?>

    <?= $form->field($model, 'dtiFechaUltMod')->textInput() ?>

    <?= $form->field($model, 'intTipoLogin')->textInput() ?>

    <?= $form->field($model, 'intCodigoRol')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
