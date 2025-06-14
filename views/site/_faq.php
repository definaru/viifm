<?php
    use yii\helpers\Html;
    use frontend\components\widget\FaqWidget;
    $header = Yii::t('vii', 'Frequently Asked Questions');
?>
<hr />
<div class="col-md-8 offset-md-2 py-5 my-5">
    <?=Html::tag('h2', $header, ['class' => 'display-5 text-center mb-5']);?>
    <?=FaqWidget::widget();?>
</div>