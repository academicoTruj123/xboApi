<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccesoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acceso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Acceso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'intIdAcceso',
            'vchToken',
            'intIdUsuario',
            'bitActivo:boolean',
            'dtiFechaInicio',
            // 'dtiFechaFin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
