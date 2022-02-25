<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VaccinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vaccines';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table tbody, tr th a{
    font-size:15px;
}
</style>
<div class="vaccines-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vaccines', ['create'], ['class' => 'btn btn-success','style'=>'font-size:10px;']) ?>
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
            'v_name',
            'dose',
            ['attribute'=>'status',
            'value'=>function($data){
                if($data['status']==1){
                    return 'Available';
                }
                else if($data['status']==0){
                 return 'Out of Stock';
            }
        }
    ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
