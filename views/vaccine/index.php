<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VaccineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vaccines';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table thead tr th a{
    font-size:15px;
}
</style>
<div class="vaccine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vaccine', ['create'], ['class' => 'btn btn-success','style'=>'font-size:10px;']) ?>
        <?= Html::submitButton('Message', ['class' => 'btn btn-success','style'=>'text-align:right; float:right; font-size:10px;','data'=>[
                                    'confirm'=>'Are you sure want to Message?',
                                    'method'=>'post'
                                ]]) ?>
    </p>
    <p

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
            ['attribute'=>'image',
            'format'=>'html',
            'value'=>function($data){
                $url=$data['image'];
                return Html::img($url,['width'=>'50','height'=>'50']);
            },
        ],
        'c_name',
        // 'c_gender',
        // 'dob' ,
        // 'birth_certifiicate_no' => 'Birth Certifiicate No',
        // 'c_weight',
        // 'fk_vaccine',
        // 'f_name',
        // 'm_name', 
        // 'citizenship_no',
        // 'p_email',
        // 'p_contact',
        // 'province',
        // 'district',
         ['attribute'=>'municipal',
         'value'=>function($data){
             $municipal=\app\models\Municipals::findOne(['id'=>$data['municipal']]);
             return $municipal['name'];
             }
        ],
        // 'ward',
        // 'image',
        // 'created_date',
        'card_issued_place',
        'card_issued_date',
        ['attribute'=>'status',
        'format'=>'html',
        'value'=>function($data){
            if ($data['status']==1){
                return Html::a('Active',['vaccine/inactive','id'=>$data['id']],['class'=>'btn btn-success']);
            }else if ($data['status']==0){
                return Html::a('Inactive',['vaccine/active','id'=>$data['id']],['class'=>'btn btn-danger']);
            }
        },
        
    ],
    

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'<b style="color:#9C27B0;font-size:15px;">Details</b>',
            'template'=>'{view}{update}{vaccine}',
            'buttons'=>[
                'vaccine'=>function($url,$model){
                    return Html::a('<i class="glyphicon glyphicon-list-alt"></i>',['vaccine-detail','id'=>$model->id],['class'=>'']);
                }
            ]
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',  // you may configure additional properties here
                
                
            ],
            
        ],
    ]); ?>


</div>
