/*<?php
namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * User model
 *
 * @property integer $id_user
 * @property string $user_name
 * @property string $name
 * @property string $password
 * @property string $email
 */
class FisUser extends ActiveRecord 
{

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['user_name', 'password', 'email'], 'required','message'=>'Không được bỏ trống! Can not be blank!'],
            [['user_name', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 32]
        ];
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($user_name)
    {
        return static::findOne(['user_name' => $user_name]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
*/