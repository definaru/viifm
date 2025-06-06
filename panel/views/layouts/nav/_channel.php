<?php
    use yii\helpers\Html;
    use frontend\components\icons\Icons;
    use frontend\components\data\Channel;

    $data = Channel::data();
?>
<li class="nav-item dropdown">
    <a 
        class="nav-link" 
        data-toggle="dropdown" 
        href="javascript:void(0);" 
        aria-expanded="false"
    >
        <?=Icons::Chats(25);?>
        <?=Html::tag('span', 4, ['class' => 'badge badge-danger navbar-badge']);?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <?php foreach($data as $item) { ?>
            <a href="javascript:void(0);" class="dropdown-item">
                <div class="media">
                    <img src="<?=$item['avatar'];?>" alt="<?=$item['title'];?>" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            <?=$item['title'];?>
                            <span class="float-right text-sm text-purple">
                                <?=Icons::Star();?>
                            </span>
                        </h3>
                        <p class="text-sm d-inline-block text-truncate" style="max-width: 180px">
                            <?=$item['description'];?>
                        </p>
                        <p class="d-flex align-items-center text-sm text-muted">
                            <?=Icons::HistoryClock(18);?>
                            <small class="ml-1">
                                <?=$item['datetime'];?>
                            </small>
                        </p>
                    </div>
                </div>
            </a>
            <div class="dropdown-divider"></div>
        <?php } ?>
        <?=Html::a(
            'Смотреть все закупки', 
            'javascript:void(0)', 
            ['class' => 'dropdown-item dropdown-footer']
        );?>
    </div>
</li>