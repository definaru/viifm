<?php
    use yii\helpers\Html;
    use frontend\panel\models\helper\Text;
    use frontend\components\icons\Icons;

    $this->title = 'Блог Vii FM';
    $this->params['breadcrumbs'][] = 'Блог на VC';
    $blog = $data['result']['subsite'];
    $url = $blog['url'];
    $name = $blog['name'];
    $description = $blog['description'];
    $avatar = $blog['avatar']['data'];
    $img = [$avatar['uuid'], $avatar['color']];
    $cover = $blog['cover']['data'];
    $background = [$cover['uuid'], $cover['color']];
    $created = $blog['created'];
    $rating = $blog['rating'];
    $counter = $blog['counters'];

    $createdData = 'Создан: '.Yii::$app->formatter->asDate($created, 'php:d F Y г.');

    $board = [
        Text::declension($counter['subscribers'], 'подписчик', 'подписчика', 'подписчиков'),
        Text::declension($counter['entries'], 'статья', 'статьи', 'статей'),
        Text::declension($counter['comments'], '', '', 'комментариев'),
        Text::declension($counter['subscriptions'], 'подписка', 'подписки', 'подписок')
    ];
    list($subscriber, $entries, $comments, $subscriptions) = $board;

    $this->registerCss("
        .top {
            top: -90px;
        }
        .text-lila {
            color: #8341ef
        }
        .accent:hover {
            background-color: #222;
        }
        @media screen and (max-width:767px) {
            .top {
                top: -45px;
            }
            .title {font-size: 16px}
            .blog {
                padding: 0;
                img {
                    border-radius: 0 !important;
                }
            }
        }
    ");
?>
<div class="row">
    <div class="col-md-6 offset-md-3 my-5 pb-5">
        <div class="card text-center border-0 mb-5">
            <div class="card-header border-0 p-0 overflow-hidden" style="background-color: #<?=$cover['color'];?>;">
                <img src="https://leonardo.osnova.io/<?=$cover['uuid'];?>/-/preview/700x/" class="w-100" alt="" />
            </div>
            <div class="card-body bg-body-tertiary position-relative">
                <div class="position-absolute start-0 w-100 top">
                    <div class="rounded-circle" style="background-color: #<?=$avatar['color']?>;margin: 0 auto;width: 25%;">
                        <img src="https://leonardo.osnova.io/<?=$avatar['uuid'];?>/-/preview/700x/" class="w-100 rounded-circle border border-5" alt="<?=$name;?>" />
                    </div>
                </div>
            </div>
            <div class="card-body bg-body-tertiary pt-5 pb-3">
                <?=Html::tag('h5', $name, ['class' => 'card-title fw-bold']);?>
                <small><?=Html::tag('i', $createdData, ['class' => 'text-lila']);?></small>
                <?=Html::tag('p', $description, ['class' => 'card-text text-secondary mt-2']);?>
                <p>
                    <span class="badge text-bg-dark bg-dark-subtle"><?=$entries;?></span>
                    <span class="badge text-bg-dark bg-dark-subtle"><?=$comments;?></span>
                    <span class="badge text-bg-dark bg-dark-subtle"><?=$subscriptions;?></span>
                </p>
            </div>
            <div class="card-footer bg-body-tertiary border-top-0 d-md-flex d-grid flex-row gap-2 align-items-center">
                <div class="d-flex gap-2 col-12 col-md-6">
                    <button class="btn btn-dark px-4" data-bs-toggle="modal" data-bs-target="#subscribers"><?=$subscriber;?></button>
                    <button class="btn btn-dark px-4 text-success fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Рейтинг блога">+<?=$rating;?></button>
                </div>
                <div class="col-12 col-md-6">
                    <a href="<?=$url;?>" class="btn btn-vii w-100" target="_blank">Читать блог</a>
                </div>
            </div>
        </div>
        <?php 
            foreach($content['result']['items'] as $item) {
            $img = $item['data']['blocks'][0]['data']['items'][0]['image']['data']['uuid'];
        ?>
            
            <div class="card mb-4 border-0">
                <div class="card-header bg-body-tertiary border-0">
                    <a href="<?=$item['data']['url'];?>" target="_blank" class="text-decoration-none text-white">
                        <?=Html::tag('h4', $item['data']['title'], ['class' => 'fw-bold title pt-2 pt-2']);?>
                    </a>
                    <i class="text-secondary"><?=Yii::$app->formatter->asDate($item['data']['date'], 'php:d F Y г.');?></i>
                </div>
                <div class="card-body bg-body-tertiary blog">
                    <a href="<?=$item['data']['url'];?>" target="_blank">
                        <?=Html::img('https://leonardo.osnova.io/'.$img.'/-/preview/592x/', ['class' => 'w-100 rounded-3']);?>
                    </a>
                </div>
                <div class="card-footer d-flex justify-content-between bg-body-tertiary border-0">
                    <div class="d-flex gap-3">
                        <?=Html::button(Icons::Heart().$item['data']['likes']['counterLikes'], ['class' => 'btn px-0 btn-outline-light border-0 bg-transparent text-white']);?>
                        <?=Html::button(Icons::Chats().$item['data']['counters']['comments'], ['class' => 'btn px-0 btn-outline-light border-0 bg-transparent text-white']);?>                        
                    </div>
                    <div class="">
                        <?=Html::button(
                            Icons::View().number_format($item['data']['counters']['views'], 0, ' ', ' '), 
                            ['class' => 'btn px-0 btn-outline-light border-0 bg-transparent text-white']
                        );?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="subscribers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Подписчики</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid">
                    <?php foreach($subscribers['result']['items'] as $items) { ?>
                        <a href="<?=$url;?>" target="_blank" class="d-flex align-items-center gap-3 text-decoration-none text-white rounded-3 p-2 accent">
                            <img 
                                src="https://leonardo.osnova.io/<?=$items['avatar']['data']['uuid'];?>/-/scale_crop/72x72/" 
                                class="border border-3 rounded-circle"
                                style="width: 50px;"
                                alt="<?=$items['name'];?>"
                            />
                            <div class="d-grid gap-2">
                                <?=Html::tag('h6', $items['name'], ['class' => 'm-0']);?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <pre><?php // var_dump($subscribers);?></pre>
            </div>
        </div>
    </div>
</div>

<?php /*
    # Разработка MVP без кода: какой инструмент выбрать?
    https://vc.ru/dev/1703384-razrabotka-mvp-bez-koda-kakoi-instrument-vybrat
*/ ?>