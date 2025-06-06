<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;
    use frontend\components\card\FnCard;
    use frontend\components\helpers\datetime\Time;

    $this->title = 'Редактировать видео';
    $this->params['breadcrumbs'][] = ['label' => 'Видеоклипы', 'url' => '/panel/video'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
?>