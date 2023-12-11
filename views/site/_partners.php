<?php
    use yii\helpers\Html;
	$partners = ['amazon', 'cloudflare', 'instagram', 'netflix', 'spotify', 'youtube'];
?>
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3 text-center">
            <?=Html::tag('h2', 'Наши партнёры', ['class' => 'display-3 fw-bold m-0']);?>
        </div>
    </div>
    <div class="row g-2 d-flex align-items-center justify-content-center mb-5 opacity-50">
		<?php foreach($partners as $item) { ?>
		<div class="col-6 col-md-2 text-center">
			<img src="/data/image/logo/<?=$item;?>.svg" alt="<?=$item;?>" class="w-75" />
		</div>
		<?php } ?>
    </div>
</div>