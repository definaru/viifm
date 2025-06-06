<?php
    use yii\helpers\Html;
    $header = 'Остались вопросы? <br />Сейчас ответим';
?>
<hr />
<div class="col-md-8 offset-md-2 py-5 my-5">

    <?=Html::tag('h2', $header, ['class' => 'display-5 text-center mb-5']);?>

    <div id="accordionExample" class="accordion d-grid gap-4">
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Как принять участие в акции, что делать ?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Попробуйте повзаимодействовать с подчёркнутым текстом, там есть подсказки и ссылки.
                    Если кликнуть по ним, вы сможете либо перейти в нужное место, либо получить подробности.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Что такое "места" в карточках ?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Кличество призов и пригласительных ссылок, которые ещё доступны.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Что такое звёзды в карточках ?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Количество месяцев, в течении которых будет действовать premium telegram аккаунт.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Что такое голоса ?
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Для продвижения и улучшения каналов нужны boost (голоса) в Telegram.<br />
                    Голоса могут давать только premium пользователи.<br />
                    Мы даём бонусы <u>только активным пользователям</u>, если у них недобор, мы можем предложит дать ваш голос, 
                    это даёт право получить подарок с недобором. В остальных случаях, подарок выдаётся только за выполненный
                    объём приглашённых подписчиков, указанных в карточке.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    А если у меня будет недобор подписчиков ?
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Все ситуации рассматриваются индивидуально. Мы прежде всего обращаем внимание на то 
                    как вы помогаете развитию нашего канала. Учитываются приглашённые и в чат и на канал.
                    Пригласительные ссылки учитывают <code>только подписчиков на канале</code>
                </div>
            </div>
        </div>
    </div>
</div>