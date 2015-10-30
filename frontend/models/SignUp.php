<?php
namespace frontend\models;

use frontend\models\Hello;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class Signup extends Model
{
    public $user_name;
    public $name;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['user_name', 'filter', 'filter' => 'trim'],
            ['user_name', 'required'],
            ['name', 'required'],
            ['user_name', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This user_name has already been taken.'],
            ['user_name', 'string', 'min' => 2, 'max' => 100],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 100],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new Hello();
            $user->user_name = $this->user_name;
            $user->password = $this->password;
            $user->name = $this->name;
            $user->email = $this->email;
            
            if ($user->validate())
            {
                $user->save();
                return $user;
            }
            else
            {
                echo "<pre>";
                print_r($user->getErrors());
                echo "</pre>";
            }
        }

        return null;
    }
}
