<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acceso */

$this->title = 'Update Acceso: ' . $model->intIdAcceso;
$this->params['breadcrumbs'][] = ['label' => 'Accesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->intIdAcceso, 'url' => ['view', 'id' => $model->intIdAcceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
