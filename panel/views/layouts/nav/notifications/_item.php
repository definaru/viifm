<?php 
    use yii\helpers\Html;
    use frontend\components\icons\Icons;
?>
<?php foreach($data as $item) { $icon = $item['icon']; ?>
    <a href="#" class="dropdown-item">
        <?=Html::tag('span', Icons::$icon(), ['class' => 'text-purple']);?>
        &#160; <?=$item['title'];?>
        <?=Html::tag(
            'span', 
            $item['time'], 
            ['class' => 'float-right text-muted text-sm']
        );?>
    </a>
    <?=$divider;?>
<?php } ?>