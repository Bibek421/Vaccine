<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Vaccine */
/* @var $form yii\widgets\ActiveForm */
$province=ArrayHelper::map(\app\models\Province::find()->all(),'id','province');
?>

<div class="vaccine-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <h2>!!!!!!!!!Successfully Submitted!!!!!!!!</h2>

    <?= Html::a('Back',['vaccine-detail','id'=>$id],['class'=>'btn btn-success']); ?>

    <?php ActiveForm::end(); ?>

</div>
