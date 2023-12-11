<?php
    use yii\helpers\Html;
    $header = 'Часто Задаваемые Вопросы';
?>
<hr />
<div class="col-md-8 offset-md-2 py-5 my-5">

    <?=Html::tag('h2', $header, ['class' => 'display-5 text-center mb-5']);?>

    <div id="accordionExample" class="accordion d-grid gap-4">
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Как поделиться сборником из вашего телеграм канала ?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Чтобы поделиться сборником на сторонних каналах, вам нужно ознакомиться с 
                    <a href="/agreement" target="_blank" rel="noopener noreferrer" class="text-light">пользовательским соглашением</a> 📖 🙄 ©.
                    Если вас всё устраивает, то мы предоставляем доступ <u>именно вам</u>.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Как попасть в ваш чат знакомств ?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Вам достаточно перейти по <a href="https://t.me/+ny1CHvzjR6Q0MGMy" target="_blank" rel="noopener noreferrer" class="text-light">этой ссылке</a>, 
                    и сделать запрос на вступление. Админичтрация чата добавит вас, или откажет, без объяснения причин. Так же вас могут заблокировать
                    или отправить в бан, если вы будете выкладывать ссылки, рекламу, грубить и хамить участникам чата, провоцировать на конфликт,
                    заниматься буллингом или спамить по разному поводу. Всё остальное разрешено. 💖✨🎉
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Почему вашу музыку нельзя скачать или скопировать ?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Согласно <code>законодательству РФ</code>, чтобы не нарушать авторские и смежные права, мы не в праве заниматься
                    распространением контента защищённого авторскими правами. По этой же причине мы не оформляем на вас подписку
                    за прослушивание музыки, и не продаём её частично или целыми сбрниками. Наша платформа создана исключительно
                    в ознакомительных целях. Вы можете скопировать название трека, чтобы найти понравившегося исполнителя на просторах интернета.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Когда уже появиться Ви, и можно ли будет общаться с ней лично ?
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body rounded-bottom border border-top-0">
                    Да <code>Ви</code> сможет общаться индивидуально, не только в чате знакомств. В 2023 году, видимо мы её не увидим в чате.
                    Но не растраивайтесь, это стоит того чтобы подождать. Вот увидите! 🥰🤗😉
                </div>
            </div>
        </div>
    </div>
</div>