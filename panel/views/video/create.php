<?php
    // use frontend\services\DownloadFileVideoService;
    $this->title = 'Добавление видео';
    $this->params['breadcrumbs'][] = ['label' => 'Видеоклипы', 'url' => '/panel/video'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
    // $filePath = Yii::getAlias('@frontend/web/data/channel/content/telegram_videos.json');
    // $videos = file_get_contents($filePath);
    // $videos = json_decode($videos, true);
    // $start = new DownloadFileVideoService();
    // $start->downloadFile($videos);
?>
<div class="row">
    <div class="col-12">
        <?php /*
        <?php if (Yii::$app->session->hasFlash('success')) { ?>
            <p class="bg-success text-white px-3 py-2"><?=Yii::$app->session->getFlash('success');?></p>
        <?php } ?>
        <?php if (Yii::$app->session->hasFlash('error')) { ?>
            <p class="text-danger"><?=Yii::$app->session->getFlash('error');?></p>
        <?php } ?>
        <?php if (Yii::$app->session->hasFlash('exception')) { ?>
            <p class="text-danger border border-danger p-4"><?=Yii::$app->session->getFlash('exception');?></p>
        <?php } ?>         
        */ ?>
 
        <?php // =$this->render('_form', ['model' => $model]);?>
        <pre><?php //var_dump($videos);?></pre>
    </div>
</div>