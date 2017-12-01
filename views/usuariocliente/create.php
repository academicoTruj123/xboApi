<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\usuariocliente */

$this->title = 'Create Usuariocliente';
$this->params['breadcrumbs'][] = ['label' => 'Usuarioclientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariocliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
