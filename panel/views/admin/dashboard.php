<?php
    use yii\bootstrap5\Html;
    use frontend\panel\models\helper\PanelWord;
    use frontend\components\box\ChannelBox;
    use frontend\components\data\Analitics;
    
    $channel_menu = Analitics::channelMenu();
    
    $this->title = 'Dashboard';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Dashboard';
?>
<div class="row">
    <div class="col-12">
        <?=Html::tag('h4', PanelWord::HelloUser(), ['class' => 'text-purple mb-4']);?>
    </div>
</div>
<?=ChannelBox::Widget(['tools' => $channel_menu]);?>

<?php /*
<pre><?php var_dump($stat);?></pre>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'Редактор', 
            'styleClass' => 'p-0'
        ]); ?>
            <?=Editor::Widget([
                'clientOptions' => [
                    'placeholder' => 'Введите здесь свой текст...',
                    'tabsize' => 2,
                    'height' => 200
                ]
            ]);?>
        <?php FnCard::end(); ?>
    </div> 
</div>
<?=Html::img(PanelWord::getGravatarImage(), [
    'style' => 'width:50px',
    'class' => 'img-circle elevation-2', 
    'alt' => 'User Avatar'
]);?>
*/ ?>