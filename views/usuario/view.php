<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->intIdUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->intIdUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->intIdUsuario], [
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
            'intIdUsuario',
            'vchCorreo',
            'vchClave',
            'vchAuthKey',
            'vchCodVerificacion',
            'intCodigoEstado',
            'dtiFechaAlta',
            'dtiFechaBaja',
            'bitActivo:boolean',
            'dtiFechaReg',
            'dtiFechaUltMod',
            'intTipoLogin',
            'intCodigoRol',
        ],
    ]) ?>

</div>
