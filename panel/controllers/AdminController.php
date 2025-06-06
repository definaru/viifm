<?php
namespace frontend\panel\controllers;

use Yii;
use GuzzleHttp\Client;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\Track;
use frontend\models\Event;
use frontend\models\Profile;
use frontend\models\Collections;
use frontend\components\data\Telegram;
use frontend\components\data\Spotify;
use frontend\components\helpers\files\ImageFile;
use frontend\components\data\TGStatAPI;
use frontend\services\TrackImportService;
use yii\data\ActiveDataProvider;


class AdminController extends Controller
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


    public static function Responce($res)
    {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        return $response->data = $res;
    }


    public function actionMembers($id)
    {
        $model = Telegram::getMembersCount($id);
        return self::Responce($model);
    }


    public function actionSearch()
    {
        $categories = TGStatAPI::getCategories();
        $countries = TGStatAPI::getCountries();
        $languages = TGStatAPI::getLanguages();
        $search = TGStatAPI::getChannelsSearch();
        
        return $this->render('search', [
            'search' => $search,
            'categories' => $categories,
            'countries' => $countries,
            'languages' => $languages
        ]);
    }


    public function actionDashboard()
    {
        $count = Telegram::getMembersCount();        
        $channel = Telegram::getChannelInfo();
        $dir = ImageFile::getDir($channel['result']['photo']['big_file_id']);
        $files = glob("$dir/*.*");
        count($files) > 0 ? '' : ImageFile::createLinkOfImage();
        return $this->render('dashboard', ['channel' => $channel, 'count' => $count]);
    }


    public function actionAnalitics()
    {
        return $this->render('analitics');
    }


    public function actionCalendar()
    {
        return $this->render('calendar');
    }


    public function actionGallery()
    {
        return $this->render('gallery');
    }


    public function actionCollections()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Collections::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        //$model = Collections::find()->orderBy('LENGTH(uid), uid')->asArray()->all();
        return $this->render('collections', 
            ['dataProvider' => $dataProvider]
        );
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionLinks()
    {
        return $this->render('links');
    }

    public function actionWidgets()
    {
        return $this->render('widgets');
    }

    public function actionKanban()
    {
        return $this->render('kanban');
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionPurchase()
    {
        return $this->render('purchase');
    }

    public function actionTrack($id)
    {
        // $multiArray = Track::getPlaylist()['items'];
        // $model = Track::findObjectByKey($multiArray, 'id', $id);
        $model = Track::getPlaylist($id);
        return $this->render('track', ['model' => $model]);
    }

    public function actionNotifications()
    {
        return $this->render('notifications');
    }

    
    public function actionAccount($account)
    {
        $model = Profile::find()->where(['account' => $account])->one();
        return $this->render('account', ['model' => $model]);
    }


    public function actionPlaylist($offset = 0, $limit = 50)
    {
        $data = Spotify::getPlaylist($offset, $limit);
        if (array_key_exists('items', $data) && is_array($data['items'])) {

            $service = new TrackImportService();
            $service->import($data['items']);

            $uids = [];
            foreach ($data['items'] as $item) {
                if (isset($item['track']['id'])) {
                    $uids[] = $item['track']['id'];
                }
            }

            $dbTracks = Track::find()
                ->where(['uid' => $uids])
                ->indexBy('uid')
                ->all();

            foreach ($data['items'] as &$item) {
                $uid = $item['track']['id'] ?? null;
                $item['track']['id_collection'] = $uid && isset($dbTracks[$uid]) ? $dbTracks[$uid]->id_collection : '';
                // if ($uid && isset($dbTracks[$uid])) {
                //     $item['track']['id_collection'] = $dbTracks[$uid]->id_collection;
                // } else {
                //     $item['track']['id_collection'] = '';
                // }
            }
            unset($item);
            return $this->render('playlist', ['data' => $data]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => Track::find(),
                'pagination' => [
                    'pageSize' => $limit,
                ],
            ]);
            return $this->render('playlist', ['dataProvider' => $dataProvider, 'data' => $data]);
        }
    }


    public function actionScripts()
    {
        $model = Event::find()->orderBy(['start' => SORT_ASC])->where(['type' => 2])->all();
        return $this->render('scripts', ['model' => $model]);
    }
    

    public function actionStat()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://api.tgstat.ru/usage/stat', [
                'query' => [
                    'token' => env('TGS_TOKEN'), 
                    'channelId' => 'viifm_lux'
                ]
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $this->render('stat', ['data' => $data]);
    }

}