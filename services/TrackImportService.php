<?php

namespace frontend\services;

use Yii;
use frontend\models\Track;
use yii\db\Exception;


class TrackImportService
{

    public function import(array $tracks)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($tracks as $item) {
                $uid = $item['track']['id'] ?? null;
                $exists = Track::find()->where(['uid' => $uid])->exists();
                if ($exists) continue;
                $track = new Track([
                    'uid'                => $item['track']['id'],
                    'image'              => $item['track']['album']['images'][2]['url'] ?? null,
                    'artist'             => $item['track']['artists'][0]['name'] ?? '...',
                    'name'               => $item['track']['name'] ?? '',
                    'album'              => $item['track']['album']['name'] ?? '',
                    'datetime'           => $item['added_at'] ?? null,
                    'duration_ms'        => $item['track']['duration_ms'] ?? 0,
                    'href'               => $item['track']['external_urls']['spotify'] ?? null,
                    'link_album'         => $item['track']['album']['external_urls']['spotify'] ?? null,
                    'truck_number'       => 0,
                    'id_collection'      => '',
                    'release_date'       => $item['track']['album']['release_date'] ?? null,
                    'album_track_number' => $item['track']['track_number'] ?? 1,
                    'album_total_tracks' => $item['track']['album']['total_tracks'] ?? 1,
                ]);
                if ($track->save()) {
                    Yii::$app->session->setFlash('success', 'record track');
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка сохранения трека: '.$track->errors);
                }
            } 
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('exception', 'Ошибка транзакции: '.$e->getMessage());
        }
    }

}