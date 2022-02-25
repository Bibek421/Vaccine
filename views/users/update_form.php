<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$province=ArrayHelper::map(\app\models\Province::find()->all(),'id','province');
?>
<style>
    #w0,label{
        color:black;
    }
</style>
<div class="users-form">
<?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered", style="background-color:white;" >
        <tr>
        <th style="background-color:#DDEAFF;font-size:15px;">
        User Form
        </th>
        </tr>
        <tr>
            <td>
                <h4 style="font-weight:bold;font-size:15px;">
                    #User Details
                </h4>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                     <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder'=>'Enter User Name....']) ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder'=>'Enter Password....']) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?= $form->field($model, 'contact_no')->textInput() ?>
                    </div>
                    </div>
            </td>
        </tr>
        <tr>
            <td>
            <h4 style="font-weight:bold;font-size:15px;">
                         #User Address
                        </h4>
                <div class="col-sm-12">
                <div class="col-sm-6">
                <?= $form->field($model, 'province')->widget(Select2::classname(), [
                        'data' => $province,
                        'options' => ['placeholder' => 'Select a Province ...','id'=>'province'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'initialize'=>true,
                        ],
                    ]); ?>
                </div>
                <div class="col-sm-6">
                <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
                        'data'=>$district,
                        'options'=>['id'=>'district'],
                        'pluginOptions'=>[
                            'depends'=>['province'],
                            'initialize'=>true,
                            'url'=>Url::to(['/vaccine/subcat'])
                        ]
                    ]); ?>
                </div>
                </div>
                <div class="col-sm-12">
                <div class="col-sm-6">
                <?= $form->field($model, 'municipal')->widget(DepDrop::classname(), [
                        'data'=>$municipal,
                        'options'=>['id'=>'municipal'],
                        'pluginOptions'=>[
                            'depends'=>['district'],
                            'initialize'=>true,
                            'url'=>Url::to(['/vaccine/municipal'])
                        ]
                    ]); ?>
                </div>
                <div class="col-sm-6">
                <?= $form->field($model, 'ward_no')->textInput() ?>
                </div>
                </div>
                <div class="col-sm-12">
                <div class="col-sm-6">
                <?= $form->field($model, 'user_type')->dropDownList(['placeholder' => 'Select User Type...', '1'=> 'Admin', '2'=> 'Health center', '3' => 'Parent']) ?>
                </div>
                <div class="col-sm-6">
                <?= $form->field($model, 'status')->dropDownList( 
            ['placeholder'=> 'Select Status.....','1' => 'Active', '0' => 'Inactive']
        ); ?>
                </div>
                </div>
                <div class="col-sm-12">
                <div class="col-sm-6">
                <?= $form->field($model, 'created_date')->textInput() ?>
                </div>
                </div>
                <div class="col-sm-12" style="text-align:left;">
                            <div class="form-group" style="margin-top:1em;">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style'=>'font-size:10px;','data'=>[
                                    'confirm'=>'Are you sure want to save?',
                                    'method'=>'post'
                                ]]) ?>
                            </div>
                        </div>
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>

</div>


    
