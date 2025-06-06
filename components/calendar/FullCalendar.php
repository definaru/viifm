<?php

namespace frontend\components\calendar;

use yii\web\View;
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\assets\CalendarAsset;


class FullCalendar extends Widget
{
    //public $id = 'calendar';
    public $options = [];
    public $events = [];

    public function init()
    {
        $this->registerClientScript();
        parent::init();
    }

    public function run()
    {
        // , ['id' => $this->id]
        return $this->render('index');
    }

    public function registerClientScript()
    {
        $options = ArrayHelper::merge(
            $this->options, ['events' => $this->events]
        );
        $encodedOptions = Json::encode($options);

        CalendarAsset::register($this->view);
        $js = <<<JS
        function initializeCalendar() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, $encodedOptions);
            calendarEl?.classList.add('card');      
            calendar.render();
        }
        // pjax:end
        document.addEventListener('DOMContentLoaded', initializeCalendar);
        $(document).on('pjax:success', initializeCalendar);
        JS;

        $this->view->registerJs($js, View::POS_END);
    }

}