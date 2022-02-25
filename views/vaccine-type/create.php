<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VaccineType */

$this->title = 'Create Vaccine Type';
$this->params['breadcrumbs'][] = ['label' => 'Vaccine Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vaccine-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
