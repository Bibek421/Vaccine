<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Childvaccine */

$this->title = 'Create Childvaccine';
$this->params['breadcrumbs'][] = ['label' => 'Childvaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="childvaccine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
