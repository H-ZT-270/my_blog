<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\User;
use yii\data\ActiveDataProvider;

/**
 * 用户类
 */

Class AdminUserController extends Controller
{
    /**
     * 过滤器
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * 共用
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    /**
     * 用户列表页
     */

    public function actionList()
    {   
        $query = User::find(); 
        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize' =>5],
            'query' => $query,
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 用户新增
     */

    public function actionAdd()
    {   
        return $this->render('add');
    }

}

