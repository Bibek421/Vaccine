<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Childvaccine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childvaccine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Chid Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Father Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mother Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Date of Birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Citizenship Number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'District')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Municipality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ward No')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
