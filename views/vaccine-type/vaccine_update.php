
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use \app\models\VaccineType;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VaccineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vaccinated Detail';
$this->params['breadcrumbs'][] = ['label'=>'Child Information','url'=>['index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];
$this->params['breadcrumbs'][] = ['label'=>$child['c_name']];
$this->params['breadcrumbs'][] = ['label'=>'Update'];


?>
<style>
    th{
        color:#337AB7;
    }
</style>
<div class="vaccine-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_vlist')->dropDownList($vaccine_list,['prompt'=>'Select Vaccine']) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter Vaccination Date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'todayHighlight'=> true,
                            'format'=>'yyyy-mm-dd',    
                        ]
                    ]); ?>

    <?= $form->field($model, 'dose')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList(VaccineType::getType(),['prompt'=>'Select Type....']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
