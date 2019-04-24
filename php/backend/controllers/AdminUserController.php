<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use backend\models\AdminUser;
use hyii2\avatar\CropAction;
use yii\web\Response;

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
            'crop'=>[
                'class' => CropAction::className(),
                'config'=>[
                    'bigImageWidth' => '200',     //大图默认宽度
                    'bigImageHeight' => '200',    //大图默认高度
                    'middleImageWidth'=> '100',   //中图默认宽度
                    'middleImageHeight'=> '100',  //中图图默认高度
                    'smallImageWidth' => '50',    //小图默认宽度
                    'smallImageHeight' => '50',   //小图默认高度
                    //头像上传目录（注：目录前不能加"/"）
                    'uploadPath' => 'uploads/images/avatar',
                ]
            ]
        ];
    }


    /**
     * 用户列表页
     */

    public function actionList()
    {   
        $query = AdminUser::find()->where(['status' => 0]); 
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
        $model = new AdminUser();

        $model->scenario = 'add';

        if($model->load(Yii::$app->request->post()) && $model->validate()){

            // 获取数据

            $model->created_at = time();
            $model->updated_at = time();

            // 保存数据

            if($model->save()){

                return $this->redirect(['list']); 

            }

        }else{

            // 加载页面

            return $this->render('add',[
                'model' => $model
            ]);

        }
        
    }


    /**
     * 修改头像
     */

    public function actionUpavatar()
    {   
        if(Yii::$app->request->isPost){

            // 获取数据

            $avatar = Yii::$app->request->post('avatar');

            // 保存数据
            $db = \Yii::$app->db->createCommand()->update('admin_user',['avatar'=>$avatar],['id'=>Yii::$app->user->identity->id])->execute();  

            $info = [];
            Yii::$app->response->format=Response::FORMAT_JSON;

            if($db){

                $info['code'] = 0;

            }else{

                $info['code'] = 1;

            }

            return $info;

        }else{

            // 加载页面

            return $this->render('upavatar');

        }
    }


    /**
     * 加入回收站
     */

    public function actionRecycle(){

        // 获取数据

        $id = Yii::$app->request->get('id');

        // 保存数据
        $db = \Yii::$app->db->createCommand()->update('admin_user',['status'=>1],['id'=>$id])->execute();  

        return $this->redirect(['list']);

    }


    /**
     * 用户信息修改
     */

    public function actionUpdate()
    {   
        $id = Yii::$app->request->get('id');

        $model = AdminUser::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->validate()){

            // 获取数据

            $model->updated_at = time();

            // 保存数据

            if($model->save()){

                return $this->redirect(['list']); 

            }

        }else{

            // 加载页面

            return $this->render('update',[
                'model' => $model
            ]);

        }
        
    }

    /**
     * 权限列表
     */



}

