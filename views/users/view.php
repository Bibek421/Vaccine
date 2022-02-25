<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    table tr th,td{
        font-size:15px;
    }
</style>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary','style'=>'font-size:10px;']) ?>
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
            'username',
            'password',
            // 'authkey',
            'email:email',
            'address',
            'contact_no',
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
            'ward_no',
            ['attribute'=>'user_type',
            'value'=>function($data){
                if($data['user_type']==1){
                    return 'Admin';
                }
                else if($data['user_type']==0){
                 return 'User';
            }else{
                return 'Parent';
            }
        }
    ],
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
            'created_date',
        ],
    ]) ?>

</div>
