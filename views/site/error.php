<?php
/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */
    use yii\helpers\Html;
    $this->title = $name;
?>
<div class="h-100 site-error bg-white">
    <div class="bg-transparent">
        <div class="container py-0 py-md-5">
            <div class="row align-items-center py-2 py-md-5">
                <div class="col-md-8 offset-md-2 d-grid gap-4 text-center text-black">
                    <?=Html::tag('h1', Html::encode($this->title), ['class' => 'display-3 fw-bold m-0 pt-5 text-dark']);?>
                    <code class="fs-4"><?= nl2br(Html::encode($message)) ?></code>
                    <p>The above error occurred while the Web server was processing your request.<br /> 
                    Please contact us if you think this is a server error. Thank you.</p>  
                    <div id="marketWidget"></div>              
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