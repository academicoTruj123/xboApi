<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tablacodigo */

$this->title = 'Update Tablacodigo: ' . $model->intIdTablaCodigo;
$this->params['breadcrumbs'][] = ['label' => 'Tablacodigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->intIdTablaCodigo, 'url' => ['view', 'id' => $model->intIdTablaCodigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tablacodigo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
