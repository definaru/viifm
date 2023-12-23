<?php
    use yii\helpers\Html;
    $this->title = 'Акция';
    $this->params['breadcrumbs'][] = $this->title;

    $url = 'https://viifm.art';
    $description = 'Telegram Premium за подписчиков';

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'акция, music, vii, enigma, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    $this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/4418680adaabd3b1f5.jpg']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
    
    $star = '
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
        </svg>
    ';
    $starfill = '
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
    </svg>
    ';
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-3">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 text-center mb-md-5']);?>
    </div>
</div>
<div class="row">
    <div class="col-md-12 my-3">
        <div class="card p-md-5 p-2 image-flame overflow-hidden">
            <div class="card-body position-relative z-3">
                <div class="row">
                    <div class="col-md-5 d-grid gap-4">
                        <h1 class="display-5 fw-bold m-0 text-center text-md-start">
                            Premium <span class="text-body-tertiary">за подписчиков</span>
                        </h1>
                        <p class="fs-5 text-light fw-lighter m-0">
                            Приглашайте людей на наш канал и получайте premium аккаунт в <strong class="fw-bold">Telegram</strong> *
                        </p>
                        <div class="d-grid d-md-block">
                            <a href="#first" class="btn btn-lg btn-vii px-5 py-3 fw-bold">
                                Подробнее
                            </a>                            
                        </div>
                    </div>
                    <div class="col-md-7 position-relative promotions">
                        <img 
                            src="/data/image/sc21662223115.png" 
                            class="position-absolute top-0 end-0" 
                            alt="Premium" 
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="first" class="row my-5">
    <div class="col-md-12 mt-5 pt-5">
        <ul class="ps-0">
            <li class="card image-flame my-md-5 my-2">
                <div class="card-body flex-column flex-md-row position-relative z-3 d-flex justify-content-between align-items-center">
                    <strong class="d-flex align-items-center gap-2">
                        <span class="fs-3">25</span> 
                        подписчиков + 
                        <u 
                            type="button"
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseExample" 
                            aria-expanded="false" 
                            aria-controls="collapseExample"
                            style="cursor: help"
                        >
                            <a href="#collapseExample" data-bs-toggle="tooltip" data-bs-title="Подробности">голос</a>
                        </u>
                        <span 
                            data-bs-toggle="tooltip" 
                            data-bs-title="Всего мест осталось"
                            class="badge rounded-pill text-bg-danger" 
                            role="button"
                        >1 место</span>
                    </strong> 
                    <div class="d-flex gap-2 gap-md-4 align-items-center flex-column flex-md-row">
                        <hr />
                        <span class="fs-4">3 мес.</span> 
                        <span class="badge text-bg-primary fw-light">premium</span>
                        <div>
                            <span class="text-warning">
                                <?php for ($i = 1; $i <= 3; $i++) { ?>
                                    <?=$starfill;?>
                                <?php } ?>
                            </span>  
                            <span class="text-muted">
                                <?php for ($i = 1; $i <= 9; $i++) { ?>
                                    <?=$star;?>
                                <?php } ?>                            
                            </span>                            
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body bg-black border-0">
                        <div class="d-md-flex gap-4 position-relative z-3 prevew">
                            <img src="/data/image/4418680adaabd3b1f5.jpg" class="rounded" style="width: 30%;" alt="" />
                            <div class="d-grid gap-5 align-self-center align-items-center h-100">
                                <h2 class="fw-bold">Telegram Boost</h2>
                                <p class="lh-lg">
                                    Для продвижения и улучшения каналов нужны boost (голоса) в Telegram.<br />
                                    Голоса могут давать только premium пользователи.<br />
                                    Поэтому мы даём бонус. Вам не надо набирать 50 подписчиков, если вы даёте свой голос.
                                </p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?=$this->render('_card', [
                'followers' => 50,
                'season' => 3,
                'places' => '1 место'
            ]);?>
            <?=$this->render('_card', [
                'followers' => 100,
                'season' => 6,
                'places' => '1 место'
            ]);?>
            <?=$this->render('_card', [
                'followers' => 250,
                'season' => 12,
                'places' => '5 мест'
            ]);?>
        </ul>
    </div>
    <div class="col-md-12">
        <span class="fs-4">*</span> Чтобы принять участие в акции, 
        вам нужно <a href="https://t.me/it_solution666" class="text-light" target="_blank">написать обращение</a>, 
        и получить <b><u role="button" data-bs-toggle="tooltip" data-bs-title="Вы получите её в день обращения в личных сообщения">пригласительную ссылку</u></b>, 
        использовать можно только её, иначе подписчики не засчитаются и вы не сможете доказать, 
        что этих подписчиков привели именно ВЫ. Мы лояльно относимся к тем, кто активно продвигает наш
        канал, поэтому подарок может быть выдан, даже если был недобор.
    </div>



    <div class="container py-5 mt-5">     
        <div class="row">
            <?=$this->render('_promo');?>
        </div>
    </div>
</div>