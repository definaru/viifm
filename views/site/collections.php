<?php
    use yii\web\View;
    use yii\helpers\Html;
    use yii\helpers\Url;
    $this->title = Yii::t('vii', 'Compendiums');
    $this->params['breadcrumbs'][] = $this->title;

    $url = Url::canonical();
    $description = Yii::t('vii', 'description collections');

    $options = <<<JS
    function viewImage(el) {
        let totalImages = el.length;
        let loadedImages = 0;

        el.forEach(function (el) {
            // Проверяем, загружена ли картинка из кеша
            if (el.complete) {
                handleImageLoad(el);
            } else {
                el.addEventListener('load', function () {
                    handleImageLoad(el);
                });
            }
        });

        function handleImageLoad(el) {
            el.style.opacity = 1;
            loadedImages++;
            // Проверяем, загружены ли все картинки
            if (loadedImages === totalImages) {
                var parentRow = el.closest('.placeholder-glow');
                if (parentRow) {
                    parentRow.classList.remove('placeholder-glow');
                }
            }
            var parentAnchor = el.closest('a');
            if (parentAnchor) {
                var placeholderDiv = parentAnchor.querySelector('.placeholder');
                if (placeholderDiv) {
                    placeholderDiv.remove();
                }
            }
        }
    }

    function checkImagesOnLoad() {
        let el = document.querySelectorAll('.loaded');
        el.forEach(function (img) {
            if (img.complete) {
                img.style.opacity = 1;
                var parentAnchor = img.closest('a');
                if (parentAnchor) {
                    var placeholderDiv = parentAnchor.querySelector('.placeholder');
                    if (placeholderDiv) {
                        placeholderDiv.remove();
                    }
                }
            }
        });
        // Удаление класса 'placeholder-glow' у родительского элемента, если все изображения загружены
        let totalImages = el.length;
        let loadedImages = Array.from(el).filter(img => img.complete).length;
        if (loadedImages === totalImages) {
            let parentRow = document.querySelector('.placeholder-glow');
            if (parentRow) {
                parentRow.classList.remove('placeholder-glow');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        checkImagesOnLoad();
        let el = document.querySelectorAll('.loaded');
        viewImage(el);
    });

    $(document).on('pjax:success', function() {
        console.log('Pjax success');
        checkImagesOnLoad();
        let el = document.querySelectorAll('.loaded');
        viewImage(el);
    });
    // function viewImage(el)
    // {
    //     Object.values(el).forEach(function (el) {
    //         var img = new Image();
    //         img.onload = function () {
    //             el.style.opacity = 1;
    //             el.classList.remove("placeholder");
    //             el.parentNode.classList.remove("placeholder-glow");
    //         }
    //         img.src = el.src
    //     }) 
    // }
    // document.addEventListener("DOMContentLoaded", function () {
    //     let el = document.querySelectorAll('.loaded')
    //     viewImage(el)
    // });    
    // $(document).on('pjax:success', function() {
    //     if(document.readyState === 'complete') {
    //         let el = document.querySelectorAll('.loaded')
    //         viewImage(el)
    //     }  
    // });
    JS;

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'сборник, music, vii, enigma, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    //$this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/4418680adaabd3b1f5.jpg']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
    $this->registerCss('
        .loaded {
            opacity: 0;
            transition: opacity .4s;
        }
    ');
    $this->registerJs($options, View::POS_END);
?>
<div class="row position-relative">
    <div class="col-md-8 offset-md-2 my-3 image-flame text-center">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 mb-md-3 mb-5 position-relative z-3']);?>
        <p><?=$description;?></p>
    </div>
</div>
<div class="row g-3 mb-5 pb-5 placeholder-glow">
    <?php arsort($model); foreach($model as $item) { ?>
    <div class="col-12 col-md-4">
        <a 
            target="_blank" 
            href="<?=$item['url'];?>" 
            rel="noopener noreferrer" 
            class="h-100 d-block rounded position-relative" 
            style="aspect-ratio: 1 / 1"
            data-bs-toggle="tooltip" 
            data-bs-placement="bottom" 
            data-bs-title="<?=$item['name'];?>"
            data-bs-custom-class="album-tooltip"
        >
            <div class="w-100 h-100 d-block rounded bg-dark placeholder position-absolute top-0 start-0"></div>
            <?=Html::img($item['image'], ['class' => 'w-100 rounded loaded', 'loading'=> "lazy", 'alt' => $item['name']]);?> 
        </a>
    </div>
    <?php } ?>
</div>