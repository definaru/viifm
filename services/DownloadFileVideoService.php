<?php

namespace frontend\services;

use Yii;
use frontend\panel\models\Video;
use yii\db\Exception;


class DownloadFileVideoService
{

    public function downloadFile(array $videos)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($videos as $item) {
                $video = new Video([
                    'chat_url' => $item['chat_url'],
                    'title' => $item['title'],
                    'duration_ms' => $item['duration_ms'],
                    'video_preview' => $item['preview_file'],
                    'description' => $item['description'],
                    'video_uuid' => Yii::$app->security->generateRandomString(30),
                    'created_at' => $item['created_at'],
                ]);
                if ($video->save()) {
                    Yii::$app->session->setFlash('success', 'record video');
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка сохранения: '.$video->errors);
                }
            }
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('exception', 'Ошибка транзакции: '.$e->getMessage());
        }
    }
}