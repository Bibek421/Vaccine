<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChildvaccineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childvaccine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Chid Name') ?>

    <?= $form->field($model, 'Father Name') ?>

    <?= $form->field($model, 'Mother Name') ?>

    <?= $form->field($model, 'Date of Birth') ?>

    <?php // echo $form->field($model, 'Gender') ?>

    <?php // echo $form->field($model, 'Citizenship Number') ?>

    <?php // echo $form->field($model, 'Province') ?>

    <?php // echo $form->field($model, 'District') ?>

    <?php // echo $form->field($model, 'Municipality') ?>

    <?php // echo $form->field($model, 'Ward No') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
