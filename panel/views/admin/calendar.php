<?php
    use frontend\components\calendar\FullCalendar;

    $this->title = 'Календарь';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Планировщик';

    $createUrl = '/panel/event/create';
    $updateUrl = '/panel/event/update';
    $deleteUrl = '/panel/event/delete';
    $eventsUrl = '/panel/event/events';

    $calendarOptions = [
        'initialView' => 'dayGridMonth',
        'editable' => true,
        'selectable' => true,
        'eventResizableFromStart' => true,
        'dayMaxEventRows' => 3,
        'locales' => [Yii::$app->language],
        'locale' => Yii::$app->language, 
        'moreLinkClick' => 'popover', 
        'headerToolbar' => [
            'left' => 'prev,next today',
            'center' => 'title',
            'right' => 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        ],
        'buttonText' => [
            'today' => Yii::t('vii', 'today'),
            'month' => Yii::t('vii', 'month'),
            'week' => Yii::t('vii', 'week'),
            'day' => Yii::t('vii', 'day'),
            'list' => Yii::t('vii', 'list')
        ],
        'eventClick' => new \yii\web\JsExpression(<<<JS
            function(info) {
                $('#modal').modal('show')
                    .find('#modalContent')
                    .load('$updateUrl?id=' + info.event.id);
            }
            JS
        ),
        'dateClick' => new \yii\web\JsExpression(<<<JS
            function(info) {
                const date = info.date;
                const formattedDate = date.toISOString().slice(0, 16);
                $('#modal').modal('show')
                    .find('#modalContent')
                    .load('$createUrl', function() {
                        $('#start').val(formattedDate);
                        $('#end').val(formattedDate);
                    });
            }
            JS
        ),
        'eventDrop' => new \yii\web\JsExpression(<<<JS
            function(info) {
                $.ajax({
                    url: '$updateUrl?id=' + info.event.id,
                    type: 'POST',
                    data: {
                        start: info.event.start.toISOString(),
                        end: info.event.end ? info.event.end.toISOString() : info.event.start.toISOString(),
                        _csrf: yii.getCsrfToken()
                    },
                    success: function(response) {
                        if (response.status !== 'success') {
                            console.error('eventDrop Ошибка при сохранении события / success', response.errors);
                            info.revert();
                        } else {
                            console.log('eventDrop успешно сохранено');
                        }
                    },
                    error: function() {
                        alert('eventDrop Ошибка при сохранении события / error');
                        info.revert();
                    }
                });
            }
            JS
        ),
        'eventResize' => new \yii\web\JsExpression(<<<JS
            function(info) {
                $.ajax({
                    url: '$updateUrl?id=' + info.event.id,
                    type: 'POST',
                    data: {
                        start: info.event.start.toISOString(),
                        end: info.event.end.toISOString(),
                        _csrf: yii.getCsrfToken()
                    },
                    success: function(response) {
                        if (response.status !== 'success') {
                            console.error('eventResize Ошибка при сохранении события / success', response.errors);
                            info.revert();
                        } else {
                            console.log('eventResize успешно сохранено');
                        }
                    },
                    error: function() {
                        alert('eventResize Ошибка при сохранении события / error');
                        info.revert();
                    }
                });
            }
            JS
        )
    ];
?>
<div class="row">
    <div class="col-12 mb-5">
        <?=FullCalendar::widget([
            'id' => 'calendar',
            'options' => $calendarOptions,
            'events' => $eventsUrl,
        ]) ?>
    </div>
</div>