<?php

namespace frontend\panel\controllers;

use Yii;
use frontend\models\Event;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class EventController extends Controller
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new Event();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/panel/calendar');
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->redirect('/panel/calendar');
            //return ['status' => 'success'];
        }

        if (Yii::$app->request->isAjax && Yii::$app->request->post('start')) {
            $model->start = Yii::$app->request->post('start');
            $model->end = Yii::$app->request->post('end') ?: $model->start;
            if ($model->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['status' => 'success'];
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'status' => 'error', 
                    'message' => 'Failed to save event.',
                    'errors' => $model->errors
                ];
            }
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('/panel/calendar');
    }

    public function actionEvents()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Event::find()->asArray()->all();
    }

    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}