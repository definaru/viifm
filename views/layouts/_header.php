<?php
    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;
    use yii\bootstrap5\Html;
    use frontend\components\auth\Login;

    // header
    $options = 'navbar navbar-expand-md navbar-dark fixed-top py-4';
    $navbar_class = 'navbar-nav text-center text-md-start mx-auto mb-2 mb-md-0 gap-3 gap-md-0 py-5 py-md-0';
    $name = Html::img('/data/image/logoname.png', ['class' => 'logo', 'alt' => Yii::$app->name]);
    $brandLabel = Html::img('/data/image/logo.png', ['class' => 'logo-icon ms-2', 'alt' => Yii::$app->name]).$name;
?>
<header>
    <?php NavBar::begin([
        'brandLabel' => $brandLabel,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'id' => 'menu',
            'class' => $options,
        ],
    ]);
    $menuItems = [
        [
            'label' => Yii::t('vii', 'Compendiums'), // Сборники
            'url' => ['/site/collections']
        ],
        [
            'label' => Yii::t('vii', 'Channel Rules'), // Правила канала
            'url' => ['/site/rules']
        ],
        // [
        //     'label' => Yii::t('vii', 'Shop'), 
        //     'url' => ['/site/shop']
        // ],
        [
            'label' => Yii::t('vii', 'Blog'), // Блог
            'url' => ['/site/blog']
        ],
        [
            'label' => Yii::t('vii', 'Encounters'), // Знакомства
            'url' => 'https://t.me/vii_chats',
            'linkOptions' => ['target'=>'_blank']
        ],
        [
            'label' => Yii::t('vii', 'Contacts'), // Контакты
            'url' => ['/site/contact']
        ],
    ];?>
    <?=Nav::widget([
        'options' => ['class' => $navbar_class],
        'items' => $menuItems,
    ]);?>
    <?=Login::signin();?>
    <?php NavBar::end();?>
</header>