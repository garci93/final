<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albumes Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albumes-temas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Albumes Temas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'album_id',
            'tema_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
