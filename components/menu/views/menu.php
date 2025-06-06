<?php
    use yii\helpers\Html;
    use frontend\components\icons\Icons;

    $size = 22;
    $angle = Icons::AngleLeftArrow(20, 'right');
    $url = Yii::$app->request->url;
    $this->registerCss('
        .text-muted {
            color: #b8b8b9 !important
        }
        [class*=sidebar-light] .nav-legacy.nav-sidebar>.nav-item .nav-treeview, 
        [class*=sidebar-light] .nav-legacy.nav-sidebar>.nav-item>.nav-treeview {
            background-color: #fdfdfd;
        }
        [class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link, 
        [class*=sidebar-light-] .nav-sidebar>.nav-item:hover>.nav-link {
            background-color: #f4f6f9 !important;
            color: #000;
        }
    ');
?>
<nav class="mt-2">
    <ul 
        class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent nav-legacy" 
        data-widget="treeview" 
        role="menu" 
        data-accordion="false"
    >
    <?php foreach($nav as $item) { 
        $icon = $item['icon'] ?? ''; 
        $href = isset($item['sub']) ? '#' : $item['label']?? '';
        $pos = isset($item['label']) ? strpos($url, $item['label']) : '';
        $shevron = isset($item['sub']) ? $angle : '';
        $badge = isset($item['badge']) ? 
            Html::tag(
                'span', 
                $item['badge'], 
                ['class' => 'right badge badge-danger']
            ) : '';
    ?>
        <?=$item['header'] === '' ? 
            '' : Html::tag(
                    'li', 
                    $item['header'], 
                    ['class' => 'nav-header']
                );
        ?>
        <?php if( isset($item['title']) ) { ?>
        <li class="nav-item<?=$pos ? ' menu-open' : '';?>">
            <a href="<?=$href;?>" class="nav-link<?=$pos !== false ? ' active' : '';?>" area-url="<?=$url;?>" area-label="<?=$item['label'];?>">
                <?=Icons::$icon($size, 'nav-icon text-muted');?>
                <?=Html::tag('p', $item['title'].$badge.$shevron);?>
            </a>
            <?php if(isset($item['sub'])) { ?>
            <ul class="nav nav-treeview">
                <?php foreach($item['sub'] as $items) { $options = ['class' => 'nav-link'];?>
                <li class="nav-item">
                    <?php if($items['href'] === $url) {Html::addCssClass($options, 'active');} ?>
                    <?=Html::a(
                        Html::tag('i', '', ['class' => 'nav-icon']).
                        Html::tag('p', '- &#160;'.$items['title']), 
                        $items['href'], 
                        $options
                    );?>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </li>        
        <?php } ?>
    <?php } ?>
    </ul>
</nav>