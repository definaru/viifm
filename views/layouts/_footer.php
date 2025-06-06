<?php
    use yii\bootstrap5\Html;
    use frontend\components\data\Payment;
    $link_option = 'link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover link-underline-dotted';
    $payment = Payment::card();
?>
<footer class="footer mt-auto py-4 text-muted">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-start justify-content-center">
                Copyright &copy; &#160;
                <?=Html::tag('strong', Yii::$app->name);?>
                &#160; <?= date('Y') ?>,&#160;
                <?=Yii::t('vii', 'All rights reserved');?>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center gap-2 py-4 py-md-0">
                <?php foreach($payment as $item) { ?>
                    <?=Html::img($item['image'], ['alt' => $item['title'], 'style' => 'width: 50px']);?>
                <?php } ?>
            </div>
            <div class="col-12 col-md-4 d-grid d-md-flex align-items-center justify-content-md-end justify-content-center gap-3 text-center text-md-end">
                <?=Html::a(Yii::t('vii', 'Channel Rules'), '/rules', ['class' => $link_option]);?>
                <?=Html::a(Yii::t('vii', 'User Agreement'), '/agreement', ['class' => $link_option]);?>
            </div>
        </div>
    </div>
</footer>