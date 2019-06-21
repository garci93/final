<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtistasTemas */

$this->title = 'Create Artistas Temas';
$this->params['breadcrumbs'][] = ['label' => 'Artistas Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artistas-temas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
