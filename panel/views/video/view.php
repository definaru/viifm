<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;
    use frontend\components\card\FnCard;
    use frontend\components\helpers\datetime\Time;

    $this->title = 'Просмотр видео';
    $this->params['breadcrumbs'][] = ['label' => 'Видеоклипы', 'url' => '/panel/video'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;

    $link = '/panel/video';
    list(
        $id, 
        $chat_url, 
        $title, 
        $duration_ms, 
        $video_preview, 
        $description, 
        $video_uuid, 
        $created_at
    ) = array_values($model);
    $time = Yii::$app->formatter->format($created_at, 'date');
    $tools = [
        [
            'href'=> $link.'/update/'.$video_uuid,
            'title' => 'Редактировать',
            'divider' => ''
        ],
        [
            'href'=> $link.'/create',
            'title' => 'Добавить новый клип',
            'divider' => '-'
        ],
        [
            'href'=> $link.'/delete/'.$video_uuid, 
            'title' => 'Удалить',
            'divider' => ''
        ]
    ];

    $this->registerCss('
        .pre-line {
            white-space: pre-line;
        }
        blockquote {
            padding: .5rem .7rem;
            border-left: .3rem solid #6f42c1;
            background-color: #6f42c145;
            margin-left: 0;
            margin-top: 0;
        }
    ');
    // /data/channel/content/
?>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => $title,
            'date' => $tools,
            'close' => false
        ]); ?>
            <div class="row">
                <div class="col-12 col-md-6">
                    <video 
                        controls 
                        id="videoSource"
                        class="w-100 rounded" 
                        poster="/data/channel/content/preview/<?=$video_uuid;?>.jpg" 
                        style="aspect-ratio: 16 / 9"
                        data-uuid="<?=$video_uuid;?>"
                    >
                        <source src="<?=$video_preview;?>" type="video/mp4" />
                    </video>
                    <canvas id="previewCanvas" style="display: none;"></canvas>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="m-0"><?=Html::tag('small', 'Опубликовано '.$time, ['class' => 'text-secondary']);?></p> 
                        <p class="m-0">Продолжительность: 
                            <?=Html::tag(
                                'span', 
                                Time::duration($duration_ms), 
                                ['class' => 'badge badge-secondary text-white']
                            );?>
                        </p>
                    </div>
                                   
                </div>
                <div class="col-12 col-md-6 pl-0 pl-md-5">
                    <?=Markdown::process($description, 'gfm');?>
                    <hr />
                    <?=Html::a(
                        'Смотреть видео', 
                        $chat_url, 
                        ['class'=> 'btn btn-lg bg-purple px-4', 'target' => '_blank']
                    );?> 
                </div>
            </div>
        <?php FnCard::end(); ?>
    </div>
</div>