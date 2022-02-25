<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vaccine */

$this->title = 'Add Child Information';
$this->params['breadcrumbs'][] = ['label' => 'Child List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vaccine-create">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'vaccine_list'=>$vaccine_list,
    ]) ?>

</div>
