<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * 后台用户AR
 */

class AdminUser extends ActiveRecord
{   
    public $password;

    /**
     * 表名
     */

    public static function tableName()
    {
        return '{{admin_user}}';
    } 

    /**
     * 字段
     */

    public function rules()
    {
        return [
            [['username','mobile','email'],'required','message'=>'不可为空'],
            [['password'],'required','message'=>'不可为空','on'=>'add'],
            [['username','password'],'match','pattern'=>'/^[a-zA-Z0-9_]{4,20}$/','message'=>'长度为6~20的 数字、英文、_ 组合'],
            ['username','unique','message'=>'用户名已被使用'],
            ['nickname','match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z0-9_]{2,20}$/u','message'=>'长度为2~20的 中文、数字、英文、_ 组合'],
            ['mobile','match','pattern'=>'/^1[34578]\d{9}$/','message'=>'请输入正确的手机号码'],
            ['email','email','message'=>'请输入正确的邮箱'],
            ['password','passwordEncrypt'],
            ['username','defaultUser','on'=>'add']
        ];
    }


    /**
     * 密码加密
     */

    public function passwordEncrypt()
    {
        $this->password_hash =  Yii::$app->security->generatePasswordHash($this->password);
    }


    /**
     * 用户默认信息
     */

    public function defaultUser()
    {   
        if($this->nickname == ''){
            $this->nickname = $this->username;
        }

        $this->avatar = '/backend/web/images/default-avatar.png';
    }

    /**
     * 场景
     */

    public function scenarios()
    {
        return [
            'add' => ['password','username','mobile','email','nickname','remark'],
            'default' => ['password','username','mobile','email','nickname','remark']
        ];
    }

    /**
     * 别名
     */

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'mobile' => '手机号码',
            'email' => '邮箱',
            'nickname' => '昵称',
            'remark' => '个人备注',
            'avatar' => '头像',
            'created_at' => '创建时间',
        ];
    }

}