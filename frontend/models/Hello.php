<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property integer $id_user
 * @property string $user_name
 * @property string $name
 * @property string $password
 * @property string $email
 */
class Hello extends ActiveRecord{

    public static function tableName(){
        return '{{%user}}';
    }

    public function rules(){
        return [
            [['user_name', 'password', 'email'], 'required','message'=>'Không được bỏ trống! Can not be blank!'],
            [['user_name', 'email','name'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id_user' => 'Id User',
            'user_name' => 'User Name',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    public function login($user_name,$password){
        $line = Hello::find()->where(['user_name'=>$user_name,'password'=>$password])->count();
        if($line==1){
            return true;
        }else{
            return false;
        }
    }

        /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($user_name){
        return static::findOne(['user_name' => $user_name]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }
}
