<?php
namespace app\models;

use yii\base\Model;
use common\models\User;
use Yii;

class UserForm extends Model{
	public $name;
	public $email;
}