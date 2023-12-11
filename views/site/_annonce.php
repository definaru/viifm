<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;
    $file = file_get_contents('https://raw.githubusercontent.com/definaru/viifm/main/ANNONCE.md');
    $music = [
        [
            'id' => '1',
            'author' => 'Thomas J. Curran',
            'name' => 'Enchanted Forest',
        ],
        [
            'id' => '2',
            'author' => 'Tartalo Music',
            'name' => 'Journey Through the Highlands',
        ],
        [
            'id' => '3',
            'author' => 'Riikka',
            'name' => 'Sinuun Jäin',
        ],
        [
            'id' => '4',
            'author' => 'James Newton Howard',
            'name' => 'Fairy Dance',
        ],
        [
            'id' => '5',
            'author' => 'Fox Amoore',
            'name' => 'The Voice of Sinnah',
        ],
        [
            'id' => '6',
            'author' => 'Celestial Aeon Project',
            'name' => 'Misty Mountains',
        ],
        [
            'id' => '7',
            'author' => 'Caroline Lavelle',
            'name' => 'Moorlough Shore',
        ],
        [
            'id' => '8',
            'author' => 'Ari Pulkkinen',
            'name' => 'The Redwood Forest',
        ],
        [
            'id' => '9',
            'author' => 'Bonnie Grace',
            'name' => 'A Celtic Blessing',
        ],
        [
            'id' => '10',
            'author' => 'Christoffer Moe Ditlevsen',
            'name' => 'Far Over the Highlands',
        ],
    ];
?>
<div class="col-md-6 offset-md-3 text-center">
    <?=Html::tag('h2', 'Анонсы', ['class' => 'display-3 fw-bold mb-4 mt-5']);?>
    <div class="next">
        <?=Markdown::process($file, 'gfm');?>
    </div>
</div>
<hr />