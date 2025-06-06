<?php
    use yii\helpers\Html;
    use frontend\components\icons\Icons;
    use frontend\components\data\Notifications;
    // See All Notifications

    $divider = Html::tag('div', '', ['class' => 'dropdown-divider']);
    $notifications = '16';
    $badge = Html::tag(
        'span', 
        $notifications, 
        ['class' => 'badge badge-warning navbar-badge']
    );
    $header = Html::tag(
        'span', 
        $notifications.' Notifications', 
        ['class' => 'dropdown-item dropdown-header']
    );
    $data = Notifications::data();
?>
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0);" aria-expanded="false">
        <?=Icons::Bell(25);?>
        <?=$badge;?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?=$header;?>
        <?=$divider;?>

        <?=$this->render('notifications/_item', ['divider' => $divider, 'data' => $data]);?>

        <?=Html::a(
            'Смотреть все оповещения →', 
            '/panel/dashboard/notifications', 
            [
                'class' => 'dropdown-item dropdown-footer',
                'style' => 'font-family: monospace; background-color: #f4f6f9'
            ]
        );?>
    </div>
</li>