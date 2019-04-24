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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [//列数据
            ['class' => 'yii\grid\SerialColumn'],//显示行号
            'username',
            'nickname',
            'mobile',
            'email',
            [
              'label' => '头像',
              'format' => [
                'image', 
                [
                  'width'=>'54',
                  'height'=>'54'
                ]
              ],
              'value' => function ($model) { 
                  return $model->avatar; 
              },
            ],
            [
              'label' => '创建时间',
              'value' => function($model) {
                  return date('Y-m-d',$model->created_at);
              },
            ],
            [ 
              'class' => 'yii\grid\ActionColumn',
              'template' => '{update} {recycle}',
              'buttons' => [
                // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                'recycle' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', 'Delete'),
                        'aria-label' => Yii::t('yii', 'Delete'),
                         'data-confirm' => Yii::t('yii', '确定要把该用户放入回收站？'),                       
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                },
              ],
            ],//显示查看、编辑、删除等按钮（默认）
        ]
    ]); ?>
</div>