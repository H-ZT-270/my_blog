<?php

$this->title = "修改头像";

use yii\helpers\Html;
use yii\web\View;

$this->registerJs(
    "$('#submit').click(function(){
        var avatar = $('.avatar-view img').attr('src');
        $.ajax({
            url:'upavatar',
            type:'post',
            data:{avatar:avatar},
            success:function(data){
                if(data.code == 0){
                    alert('修改成功');
                }else{
                    alert('修改失败');                    
                }
            }
        })
    })
    ",
    View::POS_READY
);

?>

<div>
    <br>  
    <?= \hyii2\avatar\AvatarWidget::widget(['imageUrl'=>Yii::$app->user->identity->avatar]); ?>
    <br>
    <small>注：点击即可修改头像</small>
    <br>
    <div class="form-group">
        <?= Html::submitButton('确认', ['class' => 'btn btn-primary','id' => 'submit']) ?>
    </div>
</div>