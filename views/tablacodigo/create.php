<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tablacodigo */

$this->title = 'Create Tablacodigo';
$this->params['breadcrumbs'][] = ['label' => 'Tablacodigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablacodigo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
