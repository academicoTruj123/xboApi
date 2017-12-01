<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\usuariocliente */

$this->title = 'Update Usuariocliente: ' . $model->intIdUsucliente;
$this->params['breadcrumbs'][] = ['label' => 'Usuarioclientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->intIdUsucliente, 'url' => ['view', 'id' => $model->intIdUsucliente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuariocliente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
