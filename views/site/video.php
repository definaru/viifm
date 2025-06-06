<?php
    use yii\bootstrap5\Html;
    use frontend\components\helpers\datetime\Time;
    use frontend\components\icons\Icons;

    $this->title = 'Видеоклипы';
    $this->params['breadcrumbs'][] = $this->title;

    $option = [
        'target' => '_blank',
        'rel' => 'noopener noreferrer',
        'class' => 'text-decoration-none text-body-emphasis'
    ];
    $this->registerCss('
        .play svg{transition: 1s;}
        .play:hover svg {
            fill: #fff;
            filter: drop-shadow(2px 3px 2px rgb(0 0 0 / 0.4));
            transform: scale(2)
        }
        .play .badge {transition: 1s;}
        .play:hover .badge{
            background-color: #000 !important;
        }
        .play:hover .datatime{
            display: none;
        }
    ');
?>
<div class="row position-relative">
    <div class="col-md-8 offset-md-2 my-3 image-flame text-center">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 mb-md-3 mb-5 position-relative z-3']);?>
    </div>
</div>
<div class="row g-3 mb-5 pb-5">
    <?php foreach($model as $video) { ?>
        <div class="col-12 col-md-4">
            <a 
            style="height: 236px"
            href="<?=$video["chat_url"];?>" 
            class="ratio-16x9 play bg-black d-grid align-items-center overflow-hidden rounded position-relative" 
            target="_blank" 
            rel="noopener noreferrer"
            >
                <div class="position-absolute z-3 bottom-0 end-0 p-3">
                    <span class="badge text-bg-dark">
                        <?=Time::duration($video["duration_ms"]);?>
                    </span>
                </div>
                <div class="position-absolute z-3 top-50 start-50 translate-middle text-secondary">
                    <?=Icons::Play(80);?>
                </div>
                <div class="position-absolute z-3 top-0 start-0">
                    <small class="d-block p-3">
                        <span class="badge text-bg-dark fw-light opacity-75 datatime">
                            <?=Yii::$app->formatter->format($video['created_at'], 'date');?>
                        </span>
                    </small>                    
                </div>
                <?=Html::img(
                    '/data/channel/content/preview/'.$video["video_uuid"].'.jpg',
                    ['class' => 'object-fit-cover w-100 h-100', 'alt' => $video["title"]]
                );?>
            </a>
            <div class="mb-2 p-1">
                <span class="d-block">
                    <?=Html::tag(
                        'h6', 
                        Html::a($video["title"], $video["chat_url"], $option), 
                        ['class' => 'fw-bold m-0 text-truncate', 'title' => $video["title"]]
                    );?>
                </span>
            </div>
        </div>
    <?php } ?>
</div>