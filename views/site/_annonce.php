<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;
    $filePath = Yii::getAlias('@frontend/web/data/channel/content/ANNONCE.md');
    $file = file_get_contents($filePath);
?>
<div class="col-md-6 offset-md-3 text-center">
    <?=Html::tag('h2', Yii::t('vii', 'Announcing'), ['class' => 'display-3 fw-bold mb-4 mt-5']);?>
    <p><?=$promo;?></p>
    <div class="next">
        <?=Markdown::process($file, 'gfm');?>
    </div>
</div>
<hr />