<?php

namespace frontend\controllers;

use frontend\models\Hello;
use frontend\models\SignUp;
use yii\web\Controller;
use frontend\models\FisUser;
use Yii;

class HelloController extends Controller
{

	public function actionIndex(){
		return $this->render('index');
	}

    public function actionLogin()
    {
		
		$model = new Hello();
		if($model->load(Yii::$app->request->post())){
			$request = Yii::$app->request->post('Hello');
			$user_name = $request['user_name'];
			$password = $request['password'];
			if($model->login($user_name,$password)){
				return $this->render('hello');

			}else{
				Yii::$app->session->setFlash('LoginFail');
			}
			
		}
        return $this->render('login',['model'=>$model]);
    }
/**
	 * Signs user up.
	 *
	 * @return mixed
	 */
	public function actionSignup() {
		$model = new SignUp ();
		if ($model->load ( Yii::$app->request->post () )) {
			if ($user = $model->signup ()) {
				return $this->render('signed');
			}
		}
		return $this->render ( 'signup', [ 
				'model' => $model 
		] );
	}

}
