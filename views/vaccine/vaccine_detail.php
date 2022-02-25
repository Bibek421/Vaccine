<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use \app\models\VaccineType;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VaccineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// foreach($vaccine_check){

// }
$this->title = 'Vaccinated Detail';
$this->params['breadcrumbs'][] = ['label'=>'Child Information','url'=>['index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];
$this->params['breadcrumbs'][] = ['label'=>$child['c_name']];


?>
<style>
    th{
        color:#213839;
    }
    table thead tr th a{
    font-size:15px;
    color:#213839;
}
</style>
<div class="vaccine-index" style="background-color:white;">

    <h1 style="text-align:center;">Vaccinated Detail</h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions'=>function($model){
            return ['style'=>'background-color:white;font-size:15px;'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'fk_child',
            'value'=>function($data){
                $name=\app\models\Vaccine::findone(['id'=>$data['fk_child']]);
                return $name['c_name'];
            }
            ],
            ['attribute'=>'fk_vlist',
            'value'=>function($data){
                $vaccine=\app\models\Vaccines::findone(['id'=>$data['fk_vlist']]);
                return $vaccine['v_name'];
            }
            ],
            'date',
            'dose',
            ['attribute'=>'dose',
            'label'=>'Total Dose',
            'value'=>function($data){
                $vaccine=\app\models\Vaccines::findone(['id'=>$data['fk_vlist']]);
                return $vaccine['dose'];
            }    
            ]
        ],
    ]); ?>
<hr style="border:1px solid black;border-bottom:0px;">
<h1 style="text-align:center;">Next Vaccination Details</h1>
<table class="table table-bordered" style="font-size:15px;margin-left:1px;">
    <tr>
        <th>
            #
        </th>
        <th>
            Name
        </th>
        <th>
            Vaccine
        </th>
        <th>
            Date
        </th>
        <th>
            Next Dose
        </th>
        <th>
            Total Dose
        </th>
        <th>
            Action
        </th>
    </tr>
  

        <?php 
        $count=1;
        foreach($query_next as $value){ ?>
        <tr>
            <td>
                <?=
                $count++; 
                ?>
            </td>
        <td>
            <?php $name=\app\models\Vaccine::findone(['id'=>$value['fk_child']]);
                echo $name['c_name']; ?>
        </td>
        <td>
            <?php
            $vaccine=\app\models\Vaccines::findone(['id'=>$value['fk_vlist']]);
            echo $vaccine['v_name'];
             ?>
        </td>
        <td>
            <?= $value['date'] ?>
        </td>
        <td>
            <?= $value['dose'] ?>
        </td>
        <td>
            <?php 
            $vaccine=\app\models\Vaccines::findone(['id'=>$value['fk_vlist']]);
            echo $vaccine['dose'];
            ?>
        </td>
        <td>
            <?= Html::a('Update',['vaccine-type/updatevac','id'=>$value['id']],['class'=>'btn btn-primary','style'=>'font-size:8px;']) ?>
        </td>
        </tr> 
        <?php } ?>
   
</table>
<hr style="border:1px solid black;border-bottom:0px;">
</div>
<div class="vaccine-type-form" style="background-color:white;padding-left:1em;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_child')->hiddenInput(['value'=>$child['id']])->label(false) ?>

    <?php if(empty($drop_list)){ ?>
        <h4 style="color:red;">All vaccine dose is completed</h4>
    <?php }else{ ?>
    <?= $form->field($model, 'fk_vlist')->dropDownList($drop_list,['prompt'=>'Select Vaccine'])->label('<b style="color:#213839;">Vaccine</b>') ?>
    <?php } ?>
    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter Vaccination Date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight'=> true,
                            'format'=>'yyyy-mm-dd',    
                        ]
                    ])->label('<b style="color:#213839;">Date</b>'); ?>


    <?= $form->field($model, 'type')->dropDownList(VaccineType::getType(),['prompt'=>'Select Type....'])->label('<b style="color:#213839;">Type</b>'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','style'=>'font-size:10px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
