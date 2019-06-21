<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumesTemas */

$this->title = 'Create Albumes Temas';
$this->params['breadcrumbs'][] = ['label' => 'Albumes Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albumes-temas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
