<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    $this->title = 'Vii FM. '.Yii::t('vii', 'Beautiful music');
    //Yii::$app->name;

    $color = '#de3163';
    $url = Url::canonical();
    $description = 'Погрузитесь в поток необычной и красивой музыки. Свыше 10 000 000 треков! Более чем на 15 языках мира!';
    $image = $url.'/data/image/banner/533465475464362346.jpg';

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'music, vii, enigma, era, enya, gregorian, achiella']);
    $this->registerMetaTag(['name' => 'name', 'content' => $this->title]);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    $this->registerMetaTag(['name' => 'image', 'content' => $image]);

    // Facebook Meta Tags
    $this->registerMetaTag(['property' => 'og:url', 'content' => 'https://t.me/viifm_lux']);
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
    $this->registerMetaTag(['property' => 'og:image', 'content' => $image]);

    // Twitter Meta Tags
    $this->registerMetaTag(['name' => 'twitter:card', 'content' => 'summary_large_image']);
    $this->registerMetaTag(['name' => 'twitter:title', 'content' => $this->title]);
    $this->registerMetaTag(['name' => 'twitter:description', 'content' => $description]);
    $this->registerMetaTag(['name' => 'twitter:image', 'content' => $image]);
    
    $this->registerMetaTag(['name' => 'theme-color', 'content' => $color]);
    $this->registerMetaTag(['name' => 'msapplication-navbutton-color', 'content' => $color]);
    $this->registerMetaTag(['name' => 'apple-mobile-web-app-status-bar-style', 'content' => $color]);
?>

<div class="site-index">
    <div class="mb-5 bg-transparent">
        <div class="atropos viis container py-0 py-md-5">
            <div class="row align-items-center py-2 py-md-5">
                <div class="col-12 col-md-6 d-grid gap-5">
                    <h1 class="display-3 fw-bold m-0">
                        Vii FM. 
                        <?=Html::tag(
                            'span', 
                            Yii::t('vii', 'Beautiful music'), 
                            ['class' => 'text-body-tertiary']
                        );?>
                    </h1>
                    <p class="fs-5 text-light fw-lighter m-0">
                        <?=Yii::t(
                            'vii', 
                            'description channel', 
                            [
                                'br' => '<br />', 
                                'number' => Html::tag('strong', number_format(10000000, 0, '', ' '), ['class' => 'fw-bold']),
                                'slogan' => Html::tag('u', Html::tag('i', Yii::t('vii', 'slogan'))).' 🤗'
                            ]
                        );?>
                    </p>
                    <div class="d-grid d-md-flex flex-column flex-md-row align-items-center gap-3">
                        <a href="https://t.me/viifm_lux" target="_blank" class="btn btn-lg btn-vii px-5 py-3 fw-bold">
                            <?=Yii::t('vii', 'Join')?>
                        </a>
                        <a href="https://t.me/boost/viifm_lux" target="_blank" class="btn btn-lg btn-light px-5 py-3">
                            💖 <?=Yii::t('vii', 'like')?>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center position-relative py-5 py-md-0">
                    <div class="atropos-scale">
                        <div class="atropos-rotate">
                            <div class="atropos-inner image-flame">
                                <?=Html::img(
                                    '/data/image/phone.png', [
                                        'alt' => $this->title,
                                        'class' => 'w-75 mobile position-relative z-2',
                                        'data-atropos-offset' => '-10'
                                    ]
                                );?>
                            </div> 
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?=$this->render('_features');?>

    <div class="container py-5 mt-5">     
        <div class="row">
            <?=$this->render('_annonce', ['promo' => $promo]);?>
            <?=$this->render('_partners');?>
            <?=$this->render('_faq');?>
        </div>
    </div>
</div>

<script type="module">
    import Atropos from 'https://cdn.jsdelivr.net/npm/atropos@2/atropos.min.mjs'

    const myAtropos = Atropos({
        el: '.viis',
        //activeOffset: 40,
        shadowScale: 2.05
    });
    const best = Atropos({
        el: '.best',
        activeOffset: 40,
        shadowScale: 2.05
    });
</script>