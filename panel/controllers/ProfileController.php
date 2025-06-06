<?php
namespace frontend\panel\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Profile;


class ProfileController extends Controller
{

    public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    ['allow' => false]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
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


    public function actionUpdate()
    {
        $id = Yii::$app->user->identity->profile->id;
        $model = Profile::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->upload();
            if ($model->save()) {
                $redirect = '/panel/profile';
                return $this->redirect($redirect);                
            }
        }
        return $this->render('update', ['model' => $model]);
    } 

}