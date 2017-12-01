<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarioempresa */

$this->title = 'Update Usuarioempresa: ' . $model->intIdUsuempresa;
$this->params['breadcrumbs'][] = ['label' => 'Usuarioempresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->intIdUsuempresa, 'url' => ['view', 'id' => $model->intIdUsuempresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarioempresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
