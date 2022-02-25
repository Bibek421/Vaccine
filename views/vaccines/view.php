<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vaccines */

$this->title = $model->v_name;
$this->params['breadcrumbs'][] = ['label' => 'Vaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    table tr th,td{
        font-size:15px;
    }
</style>
<div class="vaccines-view">

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

        ],
    ]) ?>

</div>
