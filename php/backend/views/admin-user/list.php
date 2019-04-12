<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = "用户列表";

?>

<div class="alert alert-success alert-dismissible modal-success-alert" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>用户删除后将会在回收站保留7天!</strong> <p></p>
</div>
<?= Html::a('新增', ['/admin-user/add'], ['class' => 'btn btn-primary btn-xs']) ?>
<div class="user-index">
    <div></div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [//列数据
            ['class' => 'yii\grid\SerialColumn'],//显示行号
             [
                'attribute' => 'username', 
                'label' => '用户名', 
            ],
            ['class' => 'yii\grid\ActionColumn'],//显示查看、编辑、删除等按钮（默认）
        ]
    ]); ?>
</div>