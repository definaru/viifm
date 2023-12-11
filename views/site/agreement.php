<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;

    $this->title = 'Пользовательское соглашение';
    $this->params['breadcrumbs'][] = $this->title;
    $file = file_get_contents('https://raw.githubusercontent.com/definaru/viifm/main/README.md');
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-5 pb-5 markdown">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 text-center mb-5']);?>
        <?=Markdown::process($file, 'gfm');?>
    </div>
</div>