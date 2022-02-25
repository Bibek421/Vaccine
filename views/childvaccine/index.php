<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChildvaccineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Childvaccines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="childvaccine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Childvaccine', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'Chid Name',
            'Father Name',
            'Mother Name',
            'Date of Birth',
            'Gender',
            //'Citizenship Number',
            //'Province',
            //'District',
            //'Municipality',
            //'Ward No',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
