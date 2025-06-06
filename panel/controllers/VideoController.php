<?php

namespace frontend\panel\controllers;

use Yii;
use frontend\panel\models\Video;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\Response;


class VideoController extends Controller
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
                    'save-preview' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find(),
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }


    public function actionSavePreview($video_uuid = '')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $video_url = Video::findOne(['video_uuid' => $video_uuid])->video_preview;
        $data = Yii::$app->request->post();
        try {
            $previewData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['preview']));
            $fileName = $video_uuid . '.jpg';
            $filePath = Yii::getAlias('@frontendWeb/data/channel/content/preview/' . $fileName);
            file_put_contents($filePath, $previewData);
            return [
                'success' => true,
                'message' => $video_uuid,
                'video' => $video_url,
                'duration_ms' => $data['duration_ms']
            ];
        } catch (\Exception $e) {
            Yii::$app->response->statusCode = 400;
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }


    public function actionView($uuid)
    {
        return $this->render('view', [
            'model' => $this->findModel($uuid)->toArray(),
        ]);
    }


    public function actionCreate()
    {
        $model = new Video();
        if ($model->load(Yii::$app->request->post())) {
            $model->video_uuid = Yii::$app->security->generateRandomString(30);
            if ($model->save()) {
                // $redirect = '/panel/playlist/collections/view/'.$model->collection_uid;
                // return $this->redirect($redirect);
                return $this->redirect(['view', 'uuid' => $model->video_uuid]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }


    public function actionUpdate($uuid)
    {
        $model = $this->findModel($uuid);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                // $redirect = '/panel/playlist/collections/view/'.$model->collection_uid;
                // return $this->redirect($redirect);
                return $this->redirect(['view', 'uuid' => $model->video_uuid]);
            }
        }
        return $this->render('update', ['model' => $model]);
    }


    public function actionDelete($uuid)
    {
        $this->findModel($uuid)->delete();
        return $this->redirect(['index']);
    }


    protected function findModel($uuid)
    {
        if (($model = Video::findOne(['video_uuid' => $uuid])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested video does not exist.');
    }

}