<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioempresaBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarioempresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarioempresa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuarioempresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'intIdUsuempresa',
            'intIdUsuario',
            'vchRazonSocial',
            'vchRuc',
            'vchContacto',
            // 'vchContactoCorreo',
            // 'vchNombreComercial',
            // 'dtmFechaCreacion',
            // 'intIdUbigeo',
            // 'vchDomicilioUbigeo',
            // 'vchDomicilioDireccion',
            // 'vchCelular',
            // 'vchTelefonoFijo',
            // 'dtiFechaAlta',
            // 'dtiFechaBaja',
            // 'intCodigoEstado',
            // 'bitActivo:boolean',
            // 'intIdUsuarioReg',
            // 'dtiFechaReg',
            // 'intIdUsuarioUltMod',
            // 'dtiFechaUltMod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
