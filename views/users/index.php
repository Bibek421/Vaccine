<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table thead tr th a{
    font-size:15px;
}
</style>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success','style'=>'font-size:10px;']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            return ['style'=>'background-color:white;font-size:15px;'];
        },
        'options'=>['style'=>'background-color:white;font-size:12px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute'=>'username',
            // 'format'=>'html',
            // 'label'=>'<b style="font-size:15px;">username</b>',
            ],
            //'password',
            // 'authkey',
            'email:email',
            'address',
            'contact_no',
        //     ['attribute'=>'province',
        //     'value' =>function($data){
        //         $province=\app\models\Province::findone(['id'=>$data['province']]);
        //         return $province['province_nepali'];
        //     } 
        // ],
        //     ['attribute'=>'district',
        //     'value' =>function($data){
        //         $district=\app\models\District::findOne(['id'=>$data['district']]);
        //         return $district['district_nepali'];
        //     }
        // ],
            ['attribute'=>'municipal',
            'value'=>function($data){
                $municipal=\app\models\Municipals::findOne(['id'=>$data['municipal']]);
                return $municipal['name'];
            }
        ],
            //'ward_no',
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
            //'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
