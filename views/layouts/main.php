<?php
    use common\widgets\Alert;
    use frontend\assets\AppAsset;
    use yii\bootstrap5\Breadcrumbs;
    use yii\bootstrap5\Html;
    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;

    AppAsset::register($this);
    $brand = ['class' => 'logo', 'alt' => Yii::$app->name];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="author" content="Ray Vaigmi" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="yandex-verification" content="934be1dcd43724ac" />
	<meta property="og:site_name" content="Telegram канал" />
	<meta property="og:locale" content="ru_RU" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	
	<link rel="icon" href="/favicon.ico" />
    <link rel="shortcut icon" href="/data/image/favicon.png" type='image/x-icon' />
	<link rel="preconnect" href="https://mc.yandex.ru" />
	
    <?php $this->head() ?>
	
</head>
<body class="d-flex flex-column h-100" data-bs-theme="dark">
<?php $this->beginBody() ?>

<header>
    <?php 
    NavBar::begin([
        'brandLabel' => Html::img('/data/image/logo.png', ['class' => 'logo-icon', 'alt' => Yii::$app->name]).
                        Html::img('/data/image/logoname.png', ['class' => 'logo', 'alt' => Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'id' => 'menu',
            'class' => 'navbar navbar-expand-md navbar-dark header fixed-top py-4',
        ],
    ]);
    $menuItems = [
        ['label' => 'Сборники', 'url' => ['/site/collections']],
        ['label' => 'Правила канала', 'url' => ['/site/rules']],
        ['label' => 'Магазин', 'url' => ['/site/shop']],
        [
            'label' => 'Блог', 
            'url' => 'https://vc.ru/u/2294632-vii-fm-krasivaya-muzyka',
            'linkOptions' => ['target'=>'_blank']
        ],
        [
            'label' => 'Знакомства', 
            'url' => 'https://t.me/vii_chats',
            'linkOptions' => ['target'=>'_blank']
        ],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    // } 

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav text-center text-md-start mx-auto mb-2 mb-md-0 gap-3 gap-md-0 py-5 py-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',
            Html::a('Войти', 'https://t.me/+ny1CHvzjR6Q0MGMy',
                ['class' => 'btn btn-light py-1 px-4', 'target' => '_blank']
            ),['class' => ['d-grid d-md-flex px-4 px-md-0']]
        );
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-light']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>

</header>

<main role="main" class="flex-shrink-0 bg-vii">
    <div class="container mt-5">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Vii',
                'url' => '/',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <?php if(Yii::$app->controller->action->id !== 'error') : ?>
        <div class="col-md-12 text-center py-5">
            <a 
                target="_blank" 
                class="btn btn-light gap-2 d-inline-flex align-items-center px-4"
                href="//yandex.ru/maps/org/237084092601/reviews?utm_source=badge&utm_medium=rating&utm_campaign=v1" 
                rel="noopener noreferrer"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg>
                Оставить отзыв
            </a>
        </div>
        <?php endif; ?>
    </div>
</main>

<footer class="footer mt-auto py-4 text-muted">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-start justify-content-center">
                &copy; &#160;<strong><?= Html::encode(Yii::$app->name) ?></strong>&#160; <?= date('Y') ?>, Все права защищены
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center gap-2 py-4 py-md-0">
                <img src="/data/image/payment/visa.svg" alt="visa" style="width: 50px" />
                <img src="/data/image/payment/amex.svg" alt="amex" style="width: 50px" />
                <img src="/data/image/payment/discover.svg" alt="discover" style="width: 50px" />
                <img src="/data/image/payment/maestro.svg" alt="maestro" style="width: 50px" />
                <img src="/data/image/payment/mastercard.svg" alt="mastercard" style="width: 50px" />
                <img src="/data/image/payment/paypal.svg" alt="paypal" style="width: 50px" />
            </div>
            <div class="col-12 col-md-4 d-grid d-md-flex align-items-center justify-content-md-end justify-content-center gap-3 text-center text-md-end">
                <a href="/rules" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Правила канала</a>
                <a href="/agreement" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Пользовательское соглашение</a>
            </div>
        </div>
    </div>
</footer>

<?php /*
Мы используем cookies для сбора обезличенных персональных данных. Они помогают настраивать рекламу и анализировать трафик. 
Оставаясь на сайте, вы соглашаетесь на сбор таких данных.
*/ ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
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
</body>
</html>
<?php $this->endPage();
