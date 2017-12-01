<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\usuariocliente */

$this->title = $model->intIdUsucliente;
$this->params['breadcrumbs'][] = ['label' => 'Usuarioclientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariocliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->intIdUsucliente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->intIdUsucliente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'intIdUsucliente',
            'intIdUsuario',
            'vchNombres',
            'vchApellidoPaterno',
            'vchApellidoMaterno',
            'intCodigoSexo',
            'dtmFechaNacimiento',
            'intIdUbigeo',
            'vchDomicilioUbigeo',
            'vchDomicilioDireccion',
            'vchDomicilioReferencia',
            'vchCelular',
            'vchTelefonoFijo',
            'dtiFechaAlta',
            'dtiFechaBaja',
            'intCodigoEstado',
            'bitActivo:boolean',
            'intIdUsuarioReg',
            'dtiFechaReg',
            'intIdUsuarioUltMod',
            'dtiFechaUltMod',
        ],
    ]) ?>

</div>
