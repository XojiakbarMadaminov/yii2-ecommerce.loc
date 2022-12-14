<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::class, [
            'options' => ['rows' => 6],
            'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'imageFile')->input('file') ?>

    <?= $form->field($model, 'price')->textInput([
            'type' => 'number'
    ]) ?>

    <?= $form->field($model, 'status')->checkbox(['checked' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
