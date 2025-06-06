<?php
    use yii\bootstrap5\Html;
    //use frontend\panel\models\helper\PanelWord;
    use frontend\components\card\FnCard;
    $this->title = 'Каналы упоминающие Vii FM';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Список упоминаний';
?>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'Реклама',
            'styleClass' => 'p-0',
            'close' => false
        ]); ?>
            <table class="table table-bordered table-hover border-top-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Канал</th>
                        <th scope="col">Индекс цитирования</th>
                        <th scope="col">Пост на упоминание</th>
                        <th scope="col">Дата публикации</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 0; foreach($model as $item) { $index++; ?>
                    <tr>
                        <th scope="row"><?=$index;?></th>
                        <td>
                            <div class="user-block">
                                <img 
                                    class="profile-user-img img-fluid img-circle border-success" 
                                    src="<?=$item["channelId"]["image100"];?>" 
                                    alt="<?=$item["channelId"]["title"];?>" 
                                />
                                <span class="username">
                                    <?=Html::a(
                                        $item["channelId"]["title"], 
                                        'https://'.$item["channelId"]["link"], 
                                        ['class' => 'text-dark', 'target' => '_blank']
                                    );?>
                                </span>
                                <span class="description">
                                    <strong><?=number_format($item["channelId"]["participants_count"]);?></strong> подписчиков
                                </span>
                            </div>
                        </td>
                        <td><?=round($item["channelId"]["ci_index"], 2);?>%</td>
                        <td><?=Html::a($item["postLink"], $item["postLink"], ['target' => '_blank']);?></td>
                        <td>
                            <small class="text-secondary">
                                <?=Yii::$app->formatter->format($item["postDate"], 'datetime');?>
                            </small>
                        </td>
                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
        <?php FnCard::end(); ?>
        <pre><?php //var_dump($model);?></pre>
    </div>
</div>