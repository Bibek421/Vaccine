<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VaccineType */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #w0,label{
        color:black;
    }
</style>

<div class="vaccine-type-form" style="background-color:white; padding-left:3px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_child')->textInput() ?>

    <?= $form->field($model, 'fk_vlist')->textInput() ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dose')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
