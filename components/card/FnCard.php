<?php
namespace frontend\components\card;

use yii\base\Widget;


class FnCard extends Widget
{
    public $title = 'Title';
    public $date = [];
    public $close = true;
    public $collapsed = false;
    public $styleClass;
    public $footer;

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        return $this->render('card', [
            'title' => $this->title,
            'date' => $this->date,
            'collapsed' => $this->collapsed,
            'styleClass' => $this->styleClass,
            'close' => $this->close,
            'content' => $content,
            'footer' => $this->footer
        ]);
    }
}
