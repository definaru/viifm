<?php
namespace frontend\panel\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Purchase;


class PurchaseController extends Controller
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

    public function actionView($id)
    {
        $model = Purchase::findOne($id);
        return $this->render('view', ['model' => $model]);
    } 

    public function actionCreate()
    {
        $model = new Purchase();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $redirect = '/panel/purchase/view/'.$model->id;
                return $this->redirect($redirect);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Purchase::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $redirect = '/panel/purchase/view/'.$model->id;
                return $this->redirect($redirect);                
            }
        }
        return $this->render('update', ['model' => $model]);
    } 


    public function actionDelete($id)
    {
        Purchase::findOne($id)->delete();
        return $this->redirect('/panel/purchase');
    }


}