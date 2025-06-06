<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;

    $this->title = 'Пользовательское соглашение';
    $this->params['breadcrumbs'][] = $this->title;
    $filePath = Yii::getAlias('@frontend/web/data/content/AGREEMENT.md');
    $file = file_get_contents($filePath);

    //$file = file_get_contents('https://raw.githubusercontent.com/definaru/viifm/main/README.md');
    $url = 'https://viifm.art';
    $description = 'Музыкальный Telegram канал и наше пользовательское соглашение';

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'акция, music, vii, enigma, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    //$this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/4418680adaabd3b1f5.jpg']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-5 pb-5 markdown">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 text-center mb-5']);?>
        <?=Markdown::process($file, 'gfm');?>
    </div>
</div>