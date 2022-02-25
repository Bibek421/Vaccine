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
<style>
    #w0,label{
        color:black;
    }
</style>
<div class="vaccine-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered" style="background-color:white;">
        <tr>
        <th style="background-color:#DDEAFF;font-size:15px;">
            Child Form
        </th>
        </tr>
        <tr>
            <td>
                <h4 style="font-weight:bold;font-size:15px;">
                    #Child Details
                </h4>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'c_name')->textInput(['maxlength' => true,'placeholder'=>'Enter Child Name...']) ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'c_gender')->radioList(['1' => 'Male', '2' => 'Female']); ?>
                    <br>
    </div>
</div>
    <div class="col-sm-12">
             <div class="col-sm-6">
                    <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter Birth Date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'today'=>true,     
                        ]
                    ]); ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'c_weight')->textInput(['maxlength' => true,'placeholder'=>'Enter Child Weight...']) ?>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'image_child')->fileInput(['maxlength' => true]) ?>
                    </div>
            
                    <div class="col-sm-6">
                    <?= $form->field($model, 'fk_vaccine')->dropDownList($vaccine_list,['prompt'=>'Enter Vaccine Name...']) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                <div class="col-sm-6">
                    <?= $form->field($model, 'card_no')->textInput(['maxlength' => true,'placeholder'=>'Enter Card Number...']) ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'birth_certifiicate_no')->textInput(['maxlength' => true,'placeholder'=>'Enter Card Number...']) ?>
                    </div>
                </div>

                    </td>
                </tr>
                <tr>
                    <td>
                    <h4 style="font-weight:bold;font-size:15px;">
                            #Faather/Mother Details
                            </h4>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'f_name')->textInput(['maxlength' => true,'placeholder'=>'Enter Father Name...']) ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'm_name')->textInput(['maxlength' => true,'placeholder'=>'Enter Father Name...']) ?>
                    <br>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'citizenship_no')->textInput(['maxlength' => true,'placeholder'=>'Enter Citizenship Number...']) ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'p_email')->textInput(['maxlength' => true,'placeholder'=>'Enter Email Id...']) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'p_contact')->textInput(['maxlength' => true,'placeholder'=>'Enter Parent Contact...']) ?>
                    </div>
                
                </div>


                </td>
                </tr>
                <tr>
                    <td>
                    <h4 style="font-weight:bold;font-size:15px;">
                            #Child Address
                        </h4>
                <div class="col-sm-12">
                <div class="col-sm-6">
                <?= $form->field($model, 'province')->widget(Select2::classname(), [
                        'data' => $province,
                        'options' => ['placeholder' => 'Select a Province ...','id'=>'province'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
                        'options'=>['id'=>'district'],
                        'pluginOptions'=>[
                            'depends'=>['province'],
                            'placeholder'=>'Select...',
                            'url'=>Url::to(['/vaccine/subcat'])
                        ]
                    ]); ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'municipal')->widget(DepDrop::classname(), [
                        'options'=>['id'=>'municipal'],
                        'pluginOptions'=>[
                            'depends'=>['district'],
                            'placeholder'=>'Select...',
                            'url'=>Url::to(['/vaccine/municipal'])
                        ]
                    ]); ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'ward')->textInput() ?>
                    </div>
                </div>
                
            </td>
        </tr>
        <tr>
            <td>
                <div class="col-sm-12">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'status')->dropDownList( 
            ['1' => 'Active', '0' => 'Inactive']
    ); ?>
                        </div>
                        <div class="col-sm-6">
                        <?=$form->field($model, 'user_type')->dropDownList(
            ['placeholder' => 'Select Type....', '1' => 'Admin', '0' => 'User', '2' => 'Parent', ]
    ); ?>
                        </div>
</div>
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                        <?=$form->field($model, 'card_issued_place')->textInput(['maxlength' => true,'placeholder'=>'Enter Card Issued Date...']) ?>
                        </div>
                        <div class="col-sm-6">
                        <?=$form->field($model, 'card_issued_date')->textInput(['maxlength' => true,'placeholder'=>'Enter Card Issued Date...']) ?>
                        </div>


                    </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="col-sm-12" style="text-align:left;">
                            <div class="form-group" style="margin-top:1em;">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success','data'=>[
                                    'confirm'=>'Are you sure want to save?',
                                    'method'=>'post'
                                ]]) ?>
                            </div>
                        </div>
            </td>
        </tr>
    </table>
  

    

    

    <?= $form->field($model, 'created_date')->hiddenInput(['maxlength' => true,'value'=>date('Y-m-d')])->label(false) ?>

    <?php ActiveForm::end(); ?>

</div>
