<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarioempresa */

$this->title = $model->intIdUsuempresa;
$this->params['breadcrumbs'][] = ['label' => 'Usuarioempresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarioempresa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->intIdUsuempresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->intIdUsuempresa], [
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
            'intIdUsuempresa',
            'intIdUsuario',
            'vchRazonSocial',
            'vchRuc',
            'vchContacto',
            'vchContactoCorreo',
            'vchNombreComercial',
            'dtmFechaCreacion',
            'intIdUbigeo',
            'vchDomicilioUbigeo',
            'vchDomicilioDireccion',
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
