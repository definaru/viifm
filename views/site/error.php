<?php
/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */
    use yii\helpers\Html;
    $this->title = $name;
    // ($exception->statusCode == '404') ? $this->title = "Ошибка 404" : '';
    // ($exception->statusCode == '403') ? $this->title = "Доступ запрещён" : '';
    // ($exception->statusCode == '500') ? $this->title = "Внутренняя ошибка сервера" : '';
?>
<div class="h-100 site-error">
    <div class="bg-transparent">
        <div class="container py-0 py-md-5">
            <div class="row align-items-center py-2 py-md-5">
                <div class="col-md-8 offset-md-2 d-grid gap-4 text-center">
                    <?=Html::tag('h1', Html::encode($this->title), ['class' => 'display-3 fw-bold m-0 pt-5 text-white']);?>
                    <code class="fs-4"><?= nl2br(Html::encode($message)) ?></code>
                    <p class="text-light">The above error occurred while the Web server was processing your request.<br /> 
                    Please contact us if you think this is a server error. Thank you.</p>  
                    <div id="marketWidget" style="border-radius: 7px;overflow: hidden"></div>              
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Yandex.Market Widget -->
<script async src="https://aflt.market.yandex.ru/widget/script/api" type="text/javascript"></script>
<script type="text/javascript">
    (function (w) {
        function start() {
            w.removeEventListener("YaMarketAffiliateLoad", start);
            w.YaMarketAffiliate.createWidget({type:"models",
	containerId:"marketWidget",
	fallback:true,
	params:{clid:4568018,
		vid:"404",
		searchText:"наушники беспроводные",
		themeRows:3,
		themeId:1 } });
        }
        w.YaMarketAffiliate
            ? start()
            : w.addEventListener("YaMarketAffiliateLoad", start);
    })(window);
</script>
<!-- End Yandex.Market Widget -->