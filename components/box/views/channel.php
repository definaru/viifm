<?php
    use yii\bootstrap5\Html;
    use frontend\components\box\InfoBox;
    use frontend\components\card\FnCard;
    use frontend\panel\models\helper\Text;
    use frontend\components\data\Analitics;
    use frontend\components\data\TGStatAPI;
    use yii\helpers\FileHelper;

    $traffic = TGStatAPI::getBroadcastStats();
    $indicators = Analitics::Indicators($traffic);

    $channel = Analitics::channelInfo();
    list($session_id, $id, $title, $username, $description, $photo, $photo_id, $members) = array_values($channel);

    $text = str_replace("\n", "<br/>", $description);
    $text = Text::wrapLinksInATag($text);
    $subscribens = Text::declension($members, 'подписчик', 'подписчика', 'подписчиков');
    $people = explode(' ', $subscribens);
    $header = Html::a($title, 'tg://resolve?domain=https://t.me/'.$username, ['class' => 'text-dark']);

    $dir = 'data/channel/avatars/'.$photo_id.'/';
    $path = Yii::getAlias('@frontendWeb/' . $dir);    
    $files = FileHelper::findFiles($path)[0];
    $avatar = '/'.$dir.basename($files);

    $this->registerCss('
        .profile-user-img {
            border: 5px solid #28a745;
        }
    ');
?>

<?php if(isset($channel)) { ?>
<div class="row">
    <?php foreach($indicators as $item) { ?>
        <?=InfoBox::Widget([
            'icon' => $item['icon'],
            'color' => $item['color'],
            'header' => $item['header'],
            'preffix_right' => $item['preffix_right'],
            'number' => $item['number']
        ]);?>
    <?php } ?>
</div>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'Данные о канале', 
            'date' => $tools
        ]); ?>
            <div class="row">
                <div class="col-12 col-md-2 box-profile">
                    <?=Html::img($avatar, [
                        'class' => 'profile-user-img img-fluid img-circle w-100', 
                        'alt' => $title
                    ]);?>
                </div>
                <div class="col-12 col-md-5">
                
                    <h4><span class="badge badge-success">Музыка</span></h4>
                    <?=Html::tag(
                        'h3', 
                        $header, 
                        ['class' => 'profile-username mt-0']
                    );?>
                    <p>
                        <span class="badge bg-purple"><?=number_format($people[0], 0, ',', ' ');?></span> 
                        <span class="text-purple">&#160;<?=$people[1];?></span>                          
                    </p>
                    <p class="text-muted"><?=$text;?></p>
                </div> 
                <div class="col-12 col-md-5">
                    <ul class="list-group list-group-flush py-0">
                        <li class="list-group-item p-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <h4 class="col-3 m-0">
                                    <?=$traffic["response"]["avg_post_reach"] ?? 0;?>
                                </h4>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic["response"]["err_percent"] ?? 0;?>%</span> ERR
                                    </li>
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']["err24_percent"] ?? 0;?>%</span> ERR<sub>24</sub>
                                    </li>
                                </ul>                            
                                <span class="text-uppercase text-right text-secondary ml-auto">
                                    Cредний охват <br/>1 публикации 
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item p-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <h4 class="col-3 m-0">
                                    <?=round($traffic['response']["ci_index"] ?? 0, 0);?>%
                                </h4>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']["mentioning_channels_count"] ?? 0;?></span> уп. каналов
                                    </li>
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']["mentions_count"] ?? 0;?></span> упоминаний
                                    </li>
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']["forwards_count"] ?? 0;?></span> репостов
                                    </li>
                                </ul>                            
                                <span class="text-uppercase text-right text-secondary ml-auto">
                                    Индекс цитирования
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item p-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <h4 class="col-3 m-0">
                                    <?=$traffic['response']['avg_post_reach'] ?? 0;?>
                                </h4> 
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']['adv_post_reach_12h'] ?? 0;?></span> за 12 часов
                                    </li>
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']['adv_post_reach_24h'] ?? 0;?></span> за 24 часа
                                    </li>
                                    <li class="list-group-item text-muted p-0 border-0">
                                        <span class="text-dark"><?=$traffic['response']['adv_post_reach_48h'] ?? 0;?></span> за 48 часов
                                    </li>
                                </ul>                            
                                <span class="text-uppercase text-right text-secondary ml-auto">
                                    Cредний рекламный охват <br/>1 публикации
                                </span>
                            </div>
                        </li>
                    </ul>
                    <pre><?php //var_dump($traffic);?></pre>
                </div>
            </div>
            <?php /*
            $array1 = array("color" => "red", 2, 4);
            $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
            $result = array_merge($array1, $array2);
            <img src="//tgstat.ru/channel/@viifm_lux/stat-widget.png" class="w-100" />
            */ ?>
        <?php FnCard::end(); ?>
    </div>
</div>
<?php } ?>