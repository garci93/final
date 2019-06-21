<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artistas Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artistas-temas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Artistas Temas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'artista_id',
            'tema_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
