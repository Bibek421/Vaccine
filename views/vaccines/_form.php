<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vaccines */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #w0,label{
        color:black;
    }
</style>

<div class="vaccines-form" style="background-color:white; padding-left:2px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'v_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dose')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'status')->dropDownList( 
            ['placeholder'=> 'Enter Status....','1' => 'Available', '0' => 'Out Of Stock']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','style'=>'font-size:10px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
