<?php
namespace frontend\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
// use yii\filters\VerbFilter;
use common\models\User;
use common\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\PasswordResetRequestForm;
use frontend\components\data\GoogleAuth;


class AuthController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['signin', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['signin'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::class,
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class
            ]
        ];
    }


    public function actionSignin()
    {
        $res = '';
        $access_token = Yii::$app->session->get('access_token');
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $model->password = '';
        if($access_token) {
            $res = GoogleAuth::getCallback();
        }
        return $this->render('signin', ['model' => $model, 'res' => $res]);
    }


    public function actionSignup()
    {
        $code = Yii::$app->request->get('code');
        $res = '';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if($code) {
                $res = $model->signupGoogle($code);
                return $this->redirect('/auth/signin?login=google');                     
            } else {
                Yii::$app->session->setFlash(
                    'success', 
                    'Thank you for registration. Please check your inbox for verification email.'
                );
                $model->signup();  
                return $this->redirect('/auth/signin');       
            }            
        }
        return $this->render('signup', ['model' => $model, 'res' => $res]);
    }


    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash(
                    'success', 
                    'Check your email for further instructions.'
                );
                return $this->goHome();
            }

            Yii::$app->session->setFlash(
                'error', 
                'Sorry, we are unable to reset password for the provided email address.'
            );
        }
        return $this->render('requestPasswordReset', ['model' => $model]);
    }

}