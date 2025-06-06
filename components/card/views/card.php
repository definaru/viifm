<?php
    use yii\helpers\Html;
    use frontend\components\icons\Icons;

    $class = ['class' => 'card-body'];
    $card = $collapsed === true ? 'card collapsed-card' : 'card';
    Html::addCssClass($class, $styleClass);
?>
<div class="<?=$card;?>">
    <div class="card-header">
        <?=Html::tag('h5', $title, ['class' => 'card-title']);?>
        <div class="card-tools">
            <?=Html::button( Icons::Minus(20), [
                'class' => 'btn btn-tool', 
                'data-card-widget' => 'collapse'
            ]);?>
            <?php if($date !== []) { ?>
            <div class="btn-group">
                <?=Html::button(
                    Icons::Tool(20), 
                    [
                        'class' => 'btn btn-tool dropdown-toggle', 
                        'data-toggle' => 'dropdown'
                    ]
                );?>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <?php foreach($date as $item) { 
                        $option = $item['target'] ? 
                            ['class' => 'dropdown-item', 'target' => '_blank'] : 
                            ['class' => 'dropdown-item'];
                        $divider = $item['divider'] == '-' ? Html::tag('div', '', ['class' => 'dropdown-divider']) : null;
                    ?>
                        <?=Html::a($item['title'], $item['href'], $option);?>
                        <?=$divider;?>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <?php if($close === true) { ?>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <?=Icons::Close(20);?>
                </button>
            <?php } ?>
        </div>
    </div>
    <?=Html::tag('div', $content, $class);?>
    <?=isset($footer) ? Html::tag('div', $footer, ['class' => 'card-footer']) : '';?>
</div>