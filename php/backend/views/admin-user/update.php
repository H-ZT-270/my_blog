<?php

$this->title = "用户信息编辑";

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="user-update">

    <?php $form = ActiveForm::begin([
        'fieldConfig'=>[
            'template'=> "<div class=\"col-sm-1\">{label}</div>\n<div class=\"col-sm-3\">{input}</div>\n{error}<br><br>",
        ]
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => 20]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 20]) ?>

        <?= $form->field($model, 'nickname') ?>

        <?= $form->field($model, 'mobile') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'remark',['template'=>"<div class=\"col-sm-1\">{label}</div>\n<div class=\"col-sm-6\">{input}</div>\n{error}<br><br><br><br>"])->textarea(['rows'=>'3','style'=>'resize:none','maxlength' => 200]) ?>


        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>