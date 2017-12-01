<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TablacodigoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tablacodigos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablacodigo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tablacodigo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'intIdTablaCodigo',
            'vchCodigo',
            'vchTexto',
            'vchDescripcion',
            'bitActivo:boolean',
            // 'intIdUsuarioReg',
            // 'dtiFechaReg',
            // 'intIdUsuarioUltMod',
            // 'dtiFechaUltMod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
