<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArtistasTemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artistas-temas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'artista_id')->textInput() ?>

    <?= $form->field($model, 'tema_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
