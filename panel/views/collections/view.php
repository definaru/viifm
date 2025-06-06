<?php
    use yii\bootstrap5\Html;
    use frontend\components\card\FnCard;
    use frontend\panel\models\helper\Text;
    use frontend\components\data\TGStatAPI;
    use frontend\components\icons\Icons;
    use frontend\components\helpers\datetime\Time;

    $this->title = 'Содержимое сборника';
    $this->params['breadcrumbs'][] = ['label' => 'Сборники', 'url' => '/panel/playlist/collections'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;

    $collection = array_values($model->toArray());
    list($id, $uid, $name, $tags, $image, $url, $collection_uid) = $collection;
    $content = Html::a($name, $url, ['class' => 'text-dark', 'target' => '_blank']);
    $link = '/panel/playlist/collections';
    $tools = [
        [
            'href'=> $link.'/update/'.$id,
            'title' => 'Редактировать',
            'divider' => ''
        ],
        [
            'href'=> '#',
            'title' => 'Добавить описание',
            'divider' => ''
        ],
        [
            'href'=> '#',
            'title' => 'Добавить плэйлист',
            'divider' => '-'
        ],
        [
            'href'=> $link.'/delete/'.$id, 
            'title' => 'Удалить',
            'divider' => ''
        ]
    ];
    $description_res = TGStatAPI::RetrievingPublicData($url);
    $description = $description_res["status"] === 'error' ? false : $description_res["response"];

    // Yii::$app->formatter->asDateTime($data->created_timestamp, 'php: j F Y, H:i'),

    $this->registerCss('
        .pre-line {
            white-space: pre-line;
        }
        blockquote {
            padding: 1em .7rem;
            border-left: .3rem solid #6f42c1;
            background-color: #6f42c145;
            margin: 0;
        }
    ');
?>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'Данные о сборнике',
            'date' => $tools,
            'close' => false
        ]); ?>
            <div class="row">
                <div class="col-12 col-md-5">
                    <?=Html::img($image, [
                        'class' => 'w-100 rounded', 
                        'loading'=> "lazy",
                        'alt' => $name
                    ]);?>
                </div>
                <div class="col-12 col-md-7">
                    <?=Html::tag('h2', $content);?>
                    <?=Text::InsertTagWord($tags);?>
                    <hr />
                    <?php foreach($model->tracks as $item) { ?>
                        <div class="alert alert-light border-0 mb-1" role="alert">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <?=$item['truck_number'] >= 10 ? $item['truck_number'] : '0'.$item['truck_number'];?>) 
                                    &#160;<strong><?=$item['artist'];?></strong> - <?=$item['name'];?>
                                </div>
                                <small>
                                    <span class="badge badge-secondary text-white">
                                        <?=Time::duration($item['duration_ms']);?>
                                    </span>
                                </small>                                
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($description === false) : ?>
                        <?=Html::tag('p', 'Описания пока нет...');?>
                    <?php else : ?>
                        <pre class="w-75 text-break pre-line"><?=$description["text"];?></pre>
                        <p class="text-secondary">Дата публикации: <?=Yii::$app->formatter->asDateTime($description["date"]);?></p>
                        <p><?=Icons::View().' '.$description["views"]?></p>
                    <?php endif; ?>
                    
                    <!-- 
                    <p>Плэйлиста нет...</p> https://t.me/viifm_lux/1075?single 
                     <pre><?php //var_dump(TGStatAPI::RetrievingPublicData('https://t.me/viifm_lux/1074'));?></pre>
                     -->
                </div>
            </div>
        <?php FnCard::end(); ?>
    </div>
</div>