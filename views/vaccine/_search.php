<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VaccineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vaccine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'f_name') ?>

    <?= $form->field($model, 'm_name') ?>

    <?= $form->field($model, 'dob') ?>

    <?= $form->field($model, 'birth_certifiicate_no') ?>

    <?php // echo $form->field($model, 'citizenship_no') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'municipal') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
