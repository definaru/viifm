<?php
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;
    $options = ['class' => 'info-box-icon'];
    Html::addCssClass($options, $color);
    $left = isset($preffix_left) ? Html::tag('small', $preffix_left) : '';
    $right = isset($preffix_right) ? Html::tag('small', $preffix_right) : '';
    $value = $left.Html::tag('h3', $number, ['class' => 'pr-1']).$right;
?>
<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <?=Html::tag('span', Icons::$icon(40), $options);?>
        <div class="info-box-content">
            <?=Html::tag('span', $header, ['class' => 'info-box-text text-secondary']);?>
            <?=Html::tag('span', $value, ['class' => 'info-box-number d-flex']);?>
        </div>
    </div>
</div>