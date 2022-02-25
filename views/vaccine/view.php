<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vaccine */

$this->title = $model->c_name;
$this->params['breadcrumbs'][] = ['label' => 'Vaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    table tr th,td{
        font-size:15px;
    }
</style>
<div class="vaccine-view" >

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'style'=>'font-size:10px;']) ?>
        <!-- <= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            ['attribute'=>'image',
            'format'=>'html',
            'value'=>function($data){
                $url=$data['image'];
                return Html::img($url,['width'=>'70;','height'=>'70']);
            }
            ],
            'c_name',
            ['attribute'=>'c_gender',
            'value'=>function($data){
                if($data['c_gender']==1){
                    return 'Male';
                }else{
                    return 'Female';
                }
            }
            ],
            'dob',
            'c_weight',
            ['attribute'=>'birth_certifiicate_no',
            'value'=>function($data){
                if($data['birth_certifiicate_no']){
                    return $data['birth_certifiicate_no'];

                }else{
                    return '- - - - -';
                }
            }
            ],
            'card_no',
            'f_name',
            'm_name',
            'dob',  
            'citizenship_no',
            ['attribute'=>'province',
            'value' =>function($data){
                $province=\app\models\Province::findone(['id'=>$data['province']]);
                return $province['province'];
            } 
        ],
            ['attribute'=>'district',
            'value' =>function($data){
                $district=\app\models\District::findOne(['id'=>$data['district']]);
                return $district['district'];
            }
        ],
            ['attribute'=>'municipal',
            'value'=>function($data){
                $municipal=\app\models\Municipals::findOne(['id'=>$data['municipal']]);
                return $municipal['name'];
            }
        ],
            'ward',
            'created_date',
            ['attribute'=>'status',
            'value'=>function($data){
                if($data['status']==1){
                    return 'Active';
                }
                else if($data['status']==0){
                 return 'Inactive';
            }
        }
    ],

            'card_issued_place',
            'card_issued_date',
            // 'user_type',
        ],
    ]) ?>

</div>
