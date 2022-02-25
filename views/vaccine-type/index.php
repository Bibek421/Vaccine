<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VaccineTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vaccine Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table thead tr th a{
    font-size:15px;
}
</style>
<div class="vaccine-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vaccine Type', ['create'], ['class' => 'btn btn-success']) ?>
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
            'fk_child',
            'fk_vlist',
            'date',
            'dose',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
