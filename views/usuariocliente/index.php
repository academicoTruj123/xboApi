<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\usuarioclienteBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarioclientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariocliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuariocliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'intIdUsucliente',
            'intIdUsuario',
            'vchNombres',
            'vchApellidoPaterno',
            'vchApellidoMaterno',
            // 'intCodigoSexo',
            // 'dtmFechaNacimiento',
            // 'intIdUbigeo',
            // 'vchDomicilioUbigeo',
            // 'vchDomicilioDireccion',
            // 'vchDomicilioReferencia',
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
