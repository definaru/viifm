<?php
    use yii\bootstrap5\Html;

    $this->title = 'Интернет-магазин';
    $this->params['breadcrumbs'][] = $this->title;

    $url = 'https://viifm.art';
    $description = 'Товары и услуги на Vii FM';
    setlocale(LC_MONETARY, 'ru_RU');
?>
<div class="row g-3 align-items-center my-5 pb-5">
    <?php foreach($model as $item) { ?>
    <div class="col-md-4">
        <div class="card image-flame">
            <a href="#" class="card-header rounded-top p-0 position-relative z-3 text-center bg-white">
                <img 
                    class="rounded-top py-4"
                    src="<?=$item['image'];?>" 
                    alt="<?=$item['title'];?>" 
                    style="height: 400px"
                />
            </a>
            <div class="card-body position-relative z-3">
                <h2 class="fs-4 line-clamp">
                    <a href="#" class="text-white text-decoration-none"><?=$item['title'];?></a>
                </h2>
                <div class="d-flex align-items-center gap-3">
                    <?=Html::tag(
                        'span', 
                        number_format($item['price'], 2, '.', ',').' ₽', 
                        ['class' => 'text-primary fw-bold fs-5']
                    );?>
                    <?=Html::tag(
                        's', 
                        '&#160;'.number_format($item['price']+1000, 2, '.', ',').' ₽ &#160;', 
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

<pre><?php //var_dump($model);?></pre>