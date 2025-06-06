<?php
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;
    use frontend\components\data\Notifications;

    $this->title = 'Notifications';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Notifications';
    $data = Notifications::data();
?>
<div class="row">
    <?php foreach($data as $item) { $icon = $item['icon']; ?>
    <div class="col-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple">
                <?=Icons::$icon(30);?>
            </span>
            <div class="info-box-content">
                <?=Html::tag('span', $item['title'], ['class' => 'info-box-number']);?>
                <?=Html::tag('span', $item['time'], ['class' => 'info-box-text text-muted']);?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>