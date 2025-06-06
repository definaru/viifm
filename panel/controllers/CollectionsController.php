<?php
namespace frontend\panel\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\Collections;
use yii\filters\VerbFilter;


class CollectionsController extends Controller
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

    public function actionView($collection_uid)
    {
        $model = Collections::find()->where(['collection_uid' => $collection_uid])->one();
        return $this->render('view', ['model' => $model]);
    } 

    public function actionUpdate($id)
    {
        $model = Collections::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->tags = implode(', ', $model->tags);
            $model->upload();
            if ($model->save()) {
                $redirect = '/panel/playlist/collections/view/'.$model->collection_uid;
                return $this->redirect($redirect);                
            }
        }
        return $this->render('update', ['model' => $model]);
    } 


    public function actionCreate()
    {
        $model = new Collections();
        if ($model->load(Yii::$app->request->post())) {
            $model->tags = implode(', ', $model->tags);
            $model->uid = time();
            $model->collection_uid = Yii::$app->security->generateRandomString(32);
            $model->upload();
            if ($model->save()) {
                $redirect = '/panel/playlist/collections/view/'.$model->collection_uid;
                return $this->redirect($redirect);
            }
        }
        return $this->render('create', ['model' => $model]);
    } 

    
    public function actionDelete($id)
    {
        Collections::findOne($id)->delete();
        return $this->redirect('/panel/playlist/collections');
    }

}