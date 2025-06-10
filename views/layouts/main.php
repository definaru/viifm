<?php
    use yii\helpers\Url;
    use yii\widgets\Pjax;
    use yii\bootstrap5\Breadcrumbs;
    use yii\bootstrap5\Html;
    use common\widgets\Alert;
    use frontend\assets\AppAsset;
    //use frontend\components\helpers\domain\Site;

    AppAsset::register($this);

    $color = '#de3163';
    $url = 'https://viifm.art';
    //Site::getBaseUrl();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php
        $this->registerMetaTag(['name' => 'theme-color', 'content' => $color]);
        $this->registerMetaTag(['name' => 'msapplication-navbutton-color', 'content' => $color]);
        $this->registerMetaTag(['name' => 'apple-mobile-web-app-status-bar-style', 'content' => $color]);    
        $this->registerMetaTag(['name' => 'author', 'content' => 'Ray Vaigmi']);
        $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
        $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
        $this->registerMetaTag(['name' => 'yandex-verification', 'content' => '934be1dcd43724ac']);
    ?>

    <?php $this->registerCsrfMetaTags();?>
    <title><?= Html::encode($this->title);?></title>
	
    <?php $this->registerLinkTag(['rel' => 'icon', 'href' => $url.'/favicon.ico']);?>
    <?php $this->registerLinkTag(['rel' => 'shortcut icon', 'href' => $url.'/data/image/favicon.png', 'type' => 'image/x-icon']);?>
    <?php $this->registerLinkTag(['rel' => 'apple-touch-icon', 'href' => $url.'/data/image/logo/vii-fm.jpg']);?>
	<?php $this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://mc.yandex.ru']);?>
	<?php $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);?>
    <?php $this->head(); ?>
</head>
<body id="top" class="d-flex flex-column h-100" data-bs-theme="dark">
<?php $this->beginBody() ?>
<?php Pjax::begin(['id' => 'order']); ?>
    <?=$this->render('_header');?>
    <main role="main" class="flex-shrink-0 bg-vii">
        <div class="container mt-5">
            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Vii',
                    'url' => '/',
                ],
                'links' => isset($this->params['breadcrumbs']) ? 
                    $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
            <?=$this->render('_button');?>
        </div>
    </main>
    <?=$this->render('_footer');?>
<?php Pjax::end(); ?>


<?php /*
Мы используем cookies для сбора обезличенных персональных данных. Они помогают настраивать рекламу и анализировать трафик. 
Оставаясь на сайте, вы соглашаетесь на сбор таких данных.
*/ ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(95785847, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
    });

</script>
<noscript><div><img src="https://mc.yandex.ru/watch/95785847" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php $this->endBody() ?>
<script type="text/javascript">
    document.addEventListener('scroll', function() {
        let menu = document.getElementById('menu');
        menu.classList.toggle('header', window.scrollY >= 100);
    });
    $(document).on('pjax:success', function() {
        $("html, body").animate({ scrollTop: $("#top").position().top }, 100);
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    });    
</script>
</body>
</html>
<?php $this->endPage();