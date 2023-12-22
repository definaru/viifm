<?php
    use yii\helpers\Html;
    $this->title = Yii::$app->name;

    $color = '#de3163';
    $url = 'https://viifm.art';
    $description = 'Погрузитесь в поток необычной и красивой музыки. Свыше 10 000 000 треков! Более чем на 15 языках мира!';

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'music, vii, enigma, era, enya, gregorian, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => 'Vii FM. Красивая музыка']);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    $this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/353425643654364456___.jpg']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
    
    $this->registerMetaTag(['name' => 'theme-color', 'content' => $color]);
    $this->registerMetaTag(['name' => 'msapplication-navbutton-color', 'content' => $color]);
    $this->registerMetaTag(['name' => 'apple-mobile-web-app-status-bar-style', 'content' => $color]);
?>
<div class="site-index">
    <div class="mb-5 bg-transparent">
        <div class="container py-0 py-md-5">
            <div class="row align-items-center py-2 py-md-5">
                <div class="col-12 col-md-6 d-grid gap-5">
                    <h1 class="display-3 fw-bold m-0">Vii FM. <span class="text-body-tertiary">Красивая музыка</span></h1>
                    <p class="fs-5 text-light fw-lighter m-0">
                        Погрузитесь в поток необычной и красивой музыки. <br />
                        Свыше <strong class="fw-bold">10 000 000</strong> треков со всего мира. Более чем на 15 разных языках. 
                        Откройте для себя новым мир звучания вместе с "Vii FM"
                        Всё самое лучшее!<br /><br />
                        <u><i>У нас особая атмосфера</i></u>
                    </p>
                    <div class="d-grid d-md-flex flex-column flex-md-row align-items-center gap-3">
                        <a href="https://t.me/viifm_lux" target="_blank" class="btn btn-lg btn-vii px-5 py-3 fw-bold">
                            Присоединиться
                        </a>
                        <a href="https://t.me/viifm_lux?boost" target="_blank" class="btn btn-lg btn-light px-5 py-3">
                            ❤ мне нравится
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center position-relative py-5 py-md-0">
                    <div class="image-flame">
                        <?=Html::img(
                            '/data/image/phone.png', [
                                'alt' => $this->title,
                                'class' => 'w-75 mobile position-relative z-2'
                            ]
                        );?>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <?=$this->render('_features');?>

    <div class="container py-5 mt-5">     
        <div class="row">
            <?=$this->render('_annonce');?>
            <?=$this->render('_partners');?>
            <?=$this->render('_faq');?>
        </div>
    </div>
</div>