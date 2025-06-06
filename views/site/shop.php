<?php
    use yii\bootstrap5\Html;

    $this->title = 'Интернет-магазин';
    $this->params['breadcrumbs'][] = $this->title;
    
    $color = '#de3163';
    $url = 'https://viifm.art';
    $description = 'Товары и услуги на Vii FM';
    $promo = 'https://wa.me/79998492927?text=Здравствуйте.%20Хочу%20получить%20ПРОМОКОД';

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'наушники, электрогитара, микрофон']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');

    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    $this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/favicon.png']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
    
    $this->registerMetaTag(['name' => 'theme-color', 'content' => $color]);
    $this->registerMetaTag(['name' => 'msapplication-navbutton-color', 'content' => $color]);
    $this->registerMetaTag(['name' => 'apple-mobile-web-app-status-bar-style', 'content' => $color]);
    setlocale(LC_MONETARY, 'ru_RU');
?>
<div class="row g-3 align-items-center my-5 pb-5">
    <div class="col-md-12">
        <div class="pe-3 flex-md-row flex-column alert alert-warning d-flex gap-2 align-items-center alert-dismissible fade show border-0" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
            <strong>Внимание!</strong> <span class="text-center text-md-start">Цены могут отличаться, смотрице цены, размеры и цвета перейдя к товару</span>
            <button type="button" class="btn-close p-2 p-md-3" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="pe-3 flex-md-row flex-column alert alert-primary d-flex gap-2 align-items-center alert-dismissible fade show border-0" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
            </svg>
            <strong>Скидки и промокоды</strong> <span class="text-center text-md-start">можно <a href="<?=$promo;?>" target="_blank" class="alert-link">получить здесь</a> всем кто является 
            подписчиком канала <a href="https://t.me/viifm_lux?boost" target="_blank" class="alert-link">Vii FM</a></span>
            <button type="button" class="btn-close p-2 p-md-3" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php foreach($model as $item) { ?>
    <div class="col-md-4">
        <div class="card image-flame">
            <a 
                href="<?=$item['url'];?>" 
                rel="noopener noreferrer" 
                class="card-header rounded-top p-0 position-relative z-3 text-center bg-white"
                target="_blank"
            >
                <img 
                    class="rounded-top py-4"
                    src="<?=$item['image'];?>" 
                    alt="<?=$item['title'];?>" 
                    style="height: 400px"
                />
            </a>
            <div class="card-body position-relative z-3">
                <h2 class="fs-4 line-clamp">
                    <a 
                        href="<?=$item['url'];?>" 
                        class="text-white text-decoration-none" 
                        rel="noopener noreferrer"
                        target="_blank"
                    >
                        <?=$item['title'];?>
                    </a>
                </h2>
                <div class="d-flex align-items-center gap-3">
                    <?=Html::tag(
                        'span', 
                        number_format((int)$item['price'], 2, '.', ',').' ₽', 
                        ['class' => 'text-primary fw-bold fs-5']
                    );?>
                    <?=Html::tag(
                        's', 
                        '&#160;'.number_format((int)$item['price']+1000, 2, '.', ',').' ₽ &#160;', 
                        ['class' => 'text-muted']
                    );?>
                </div>
            </div>
            <?php /*
            <div class="card-footer border-top-0 d-flex gap-3 py-3 bg-transparent pt-0">
                <a href="#" class="btn btn-vii d-inline-flex align-items-center justify-content-center w-100 gap-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                    </svg>
                    <span>В корзину</span>
                </a>
                <a href="#" class="btn btn-light w-100 d-flex align-items-center justify-content-center border-0">
                    Подробнее
                </a>
            </div>            
            */ ?>

        </div>
    </div>
    <?php } ?>
</div>

<p class="text-center">Сайт не является публичной офертой согласно положениям статьи 437 ГК РФ.<br /><br />
Мы не занимаемся сбором и хранением персональных данных наших пользователей.</p>
<pre><?php //var_dump($model);?></pre>