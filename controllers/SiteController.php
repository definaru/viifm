<?php

namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Collections;
use frontend\models\ResetPasswordForm;
use frontend\models\ContactForm;
use frontend\models\OrderForm;
use frontend\models\Shop;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use frontend\components\data\VcRuApi;
use frontend\panel\models\Video;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post']
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            // 'captcha' => [
            //     'class' => \yii\captcha\CaptchaAction::class,
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            //     'fontFile' => dirname(__FILE__).'/captcha/LuckySunshine-axo9R.ttf',
            //     'minLength' => 9,
            //     'backColor' => 0x47002a,
            //     'foreColor' => 0xffffff
            // ],
        ];
    }


    public function actionIndex($playlist = '', $datetime = '')
    {

        if(Yii::$app->request->get('playlist')) {
            $collection = new Collections();
            $collection->updateMarkdown($playlist, $datetime);
        }

        $code = Yii::$app->request->get('code');
        $promo = '';
        // $promo = basename($collection->url) === 'viifm_lux' ? 
        //     Yii::t('vii', 'Coming soon') : 
        //     Yii::t('vii', 'New compilation');
        if($code) {
            return $this->redirect('/auth/signup?code='.$code);
        }
        return $this->render('index', ['promo' => $promo]);
    }

    public function actionVideo()
    {
        $model = Video::find()
            ->select('chat_url, title, duration_ms, video_uuid, created_at')
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        return $this->render('video', ['model' => $model]);
    }
    


    public function actionRules()
    {
        return $this->render('rules');
    }


    public function actionCollections()
    {
        $model = Collections::find()->orderBy('LENGTH(uid), uid')->asArray()->all();
        return $this->render('collections', ['model' => $model]);
    }


    public function actionAgreement()
    {
        return $this->render('agreement');
    }


    public function actionPromotions()
    {
        return $this->render('promotions');
    }

    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/auth/signin');
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail(Yii::$app->params['senderEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
        } 
        return $this->render('contact', ['model' => $model]);
    }


    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionBlog()
    {
        $id = 2294632;
        $data = VcRuApi::getBlog($id);
        $subscribers = VcRuApi::getSubscribers($id);
        $content = VcRuApi::getTimeline($id);

        return $this->render('blog', [
            'data' => $data,
            'subscribers' => $subscribers,
            'content' => $content
        ]);
    }


    public function actionOrder()
    {
        Yii::$app->session->setFlash('orderSubmitted');
        OrderForm::getMessageTelegram(Yii::$app->request->post()['email']);
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = [
            'message' => 'Успешно! Ваш заказ принят',
            'email' => Yii::$app->request->post()['email']
        ];
    }

    public function actionVinill()
    {
        $model = new OrderForm();
        //if( isset(Yii::$app->request->post('send')) ) { && $model->validate()
        if ( $model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('orderSubmitted');
            $order = $_POST["email"];
            //OrderForm::getMessageTelegram(Yii::$app->request->post()['email']);
            //$model = new OrderForm();
            return $this->render('vinill', ['model' => $model, 'order' => $order]);
        }  
        return $this->render('vinill');
    }


    public function actionShop()
    {
        $model = Shop::find()->asArray()->all();
        return $this->render('shop', ['model' => $model]);
    }


    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    
}