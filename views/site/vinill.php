<?php
    use yii\bootstrap5\Html;

    $this->title = 'Виниловые пластинки';
    $this->params['breadcrumbs'][] = $this->title;
    $agree = Html::a('персональных данных', '/agreement', ['target' => '_blank']);
    $this->registerCss('   
        @charset "UTF-8";
        @import url("https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"); 
        .swiper {
            width: 100%;
            height: auto;
        }
        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100%;
        }
        .swiper-slide img {
            display: block;
            width: 100%;
        }
        .ol_zeros {
            counter-reset: num;
            list-style: none;
            margin: 0 0 20px 0;
            padding: 0 0 0 0;
        }
        .ol_zeros li {
            counter-increment: num;
            position: relative;
            margin: 5px 0 5px 40px;
            padding: 0 0 0 0;
            font-size: 16px;
            line-height: 20px;
        }
        .ol_zeros li:before {
            content: counter(num) ".";
            color: #ea868f;
            position: absolute;
            left: -40px;
            top: 0;
            text-align: right;
            font-family: monospace;
            font-size: 20px;
        }
        .ol_zeros i {
            font-family: system-ui;
        }
        .ol_zeros li:nth-child(-n+9):before {
            content: "0" counter(num) ".";
        }
        .form-check-inputs {
            border-radius: 0.3em;
            width: 1em;
            height: 1em;
            margin-top: 0.25em;
            vertical-align: top;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            appearance: none;
            -webkit-print-color-adjust: exact;
            background-color: #eb469f;
            border: 1px solid #6b1543;
            float: left;
            margin-left: -1.5em;
        }
        .form-check-inputs[checked="true"] {
            background-image: url(data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224px%22%20viewBox%3D%220%20-960%20960%20960%22%20width%3D%2224px%22%20fill%3D%22%2315202b%22%3E%3Cpath%20d%3D%22M382-240%20154-468l57-57%20171%20171%20367-367%2057%2057-424%20424Z%22%2F%3E%3C%2Fsvg%3E);
        }
    ');
?>
<div class="row align-items-center my-5 pb-5">
    <div class="col-md-5 position-relative">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/data/image/vinill/31923948_800_800.jpg" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="/data/image/vinill/12388_8.jpg" alt="" />
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3 mt-2">
            <h6 class="m-0">ID: 12388</h6>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat text-body-tertiary" viewBox="0 0 16 16">
                <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"></path>
            </svg>
            <span class="text-body-tertiary">Изображение можно крутить</span>
        </div>
    </div>
    <div class="col-md-7">
        <div class="px-0 px-md-5">
            <h6 class="fw-light text-body-tertiary">The Ultimate Compilation</h6>
            <h3 class="display-5 fw-bold mb-4">
                <span>"Real Sadness & Other Gregorian Mysteries"</span>
            </h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Стиль:</div>
                    New Age, Ambient
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Издание:</div>
                    Оригинал
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Год издания:</div>
                    1990
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Лейбл:</div>
                    Dance Street
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Страна:</div>
                    Германия
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Размер пластинки:</div>
                    LP
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Состояние:</div>
                    nm/nm
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start bg-transparent list-group-item-danger">
                    <div class="fw-bold">Винил-код:</div>
                    DST 30036-1
                </li>
            </ul>  
            <?php if (Yii::$app->session->hasFlash('orderSubmitted')): ?>
                <div class="alert alert-success text-center border-0 m-0 d-inline-flex justify-content-center align-items-center gap-2 w-100 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"></path>
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"></path>
                    </svg>
                    <strong>Успешно</strong> 
                    <span>Ваш заказ принят</span>
                </div>
            <?php else: ?>
                <div class="d-md-flex d-grid flex-row gap-2 align-items-center mt-4">
                    <div class="p-2 d-grid">
                        <button class="btn btn-vii px-5 btn-lg" data-bs-toggle="modal" data-bs-target="#subscriber">Заказать</button>
                    </div>
                    <div id="order" class="p-2 d-grid justify-content-center">
                        <div class="d-flex d-grid align-items-center gap-2 text-danger border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"></path>
                            </svg>
                            <span class="text-muted">Нет в наличии</span>                        
                        </div>
                    </div>
                </div>   
            <?php endif ; ?>
        </div>
    </div>
    <div class="col-md-12 py-5">
        <hr />
    </div>
    <div class="col-md-5">
        <ol class="d-flex flex-column gap-3 ol_zeros">
            <li><strong>Nostradamus</strong> - Sadeness Part I</li>
            <li><strong>Gregoria</strong> - The Rhythm</li>
            <li><strong>Prayers</strong> - Alleluia</li>
            <li><strong>Physical Motion</strong> - Ave Maria</li>
            <li><strong>Ars Mundi</strong> - Inquisitio</li>
            <li><strong>Magna Charta</strong> - Hymn</li>
            <li><strong>Equinox</strong> - Amen Part II</li>
            <li>
                <strong>Trance Dance</strong> - Tales Of Mystery 
                <i class="text-body-tertiary d-block d-md-inline-block">(Darkness Version)</i>
            </li>
            <li>
                <strong>After One</strong> - Real Sadness II 
                <i class="text-body-tertiary d-block d-md-inline-block">(The Happiness Rap)</i>
            </li>
        </ol>
    </div>    
    <div class="col-md-7">
        <p><strong>"Real Sadness & Other Gregorian Mysteries"</strong> - один из немногих сборников, 
        вышедших на виниле с музыкой в стиле культовой группы Enigma. 
        Различные группы на гребне популярности проекта Мишеля Крету 
        создают близкую или основанную на базе ее композиций похожую музыку, 
        насыщенную мягкой атмосферой new age стиля и грегорианскими хоралами. 
        И хотя ни одна из них в дальнейшем не добилась и грамма популярности 
        Enigma <i class="text-body-tertiary">(даже никто из них не смог соорудить полноценной пластинки!)</i>, 
        сборник получился просто бесподобным, и в целом выглядит совсем не 
        хуже первых студийных альбомов проекта Enigma, которая появилась уже после выхода этого сборника.
        Именно по этой причине здесь можно услышать много знакомого и известного, вошедшего в первый альбом <b>"MCMXC a.D."</b> 
        <i class="text-body-tertiary">(Что буквально с римских цифр переводится как "1990 год нашей эры")</i>.</p>
        <p>Так совпало, что данный винил стал легендарным и историческим, по многим причинам: <br />
        В 1990 году был распад СССР, в этом году вышел <u>этот сборник</u> и 
        <span 
            class="d-inline-block" 
            tabindex="0" 
            data-bs-html="true"
            data-bs-toggle="popover" 
            data-bs-trigger="hover focus" 
            data-bs-title="ENIGMA &laquo;MCMXC a.D.&raquo;"
            data-bs-content="
            <img src='/data/image/scale_1200.jpg' width='100%' />
            <ul class='list-group list-group-flush mt-2'>
                <li class='list-group-item'><small><b>Вышел:</b> 3 декабря 1990</small></li>
                <li class='list-group-item'><small><b>Лейбл:</b> Virgin Schallplatten GmbH</small></li>
                <li class='list-group-item'><small><b>Номер в каталоге:</b> 261 209</small></li>
                <li class='list-group-item'><small><b>Мировые продажи:</b> 20 млн копий</small></li>
            </ul>"
            data-bs-placement="top"
        >
            <abbr title="MCMXC a.D.">первый альбом Enigma</abbr>
        </span>, на Филлипинах случилось 
        сильнейшее землетрясение в истории магнитудой 7,7 баллов! Запуск космического телескопа Hubble. 
        Этот год стал эпохой широкого распространения персональных компьютеров и интернета.
        В России это стало термином "Лихие девяностые", так как в этот год случилось много исторических, мощных и громких событий
        которые изменили мир.</p>
        <p>
            <strong>Можно сказать что перед вами первоисточник зарождения нового жанра NEW AGE ("Новая Эра") в музыке, с которого всё началось.</strong>
        </p>
        <p>Обязательная вещь для поклонников "энигматики"! 
        На виниле издавалась только в Германии и Южной Корее, 
        а посему встречается крайне редко!</p>
    </div>
    <div class="col-md-12 py-5"><hr /></div>
</div> 

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="subscriber" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <?= Html::beginForm('', 'post', 
            [
                'id' => 'new',
                'class' => 'modal-content border-0 bg-vii',
                //'enablePushState' => false,
                //'data-pjax' => true
            ]
        ); ?>
            <div class="modal-header border-0">
                <h5 class="modal-title">Оформление подписки</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-0">
                <div class="mb-2 email">
                    <label class="form-label fw-bold text-body-tertiary mb-0">Email address</label>
                    <?=Html::input(
                        'email', 'email', '', 
                        [
                            'class' => 'form-control form-control-lg', 
                            'placeholder' => 'name@example.com'
                        ]
                    );?>
                    <div class="form-text">На указанный адрес поступит информация о наличии товара.</div>
                </div>
                <div class="form-check">
                    <?= Html::checkbox('agree', false, [
                            'id' => 'agree',
                            'label' => 'Я согласен на обработку моих '.$agree,
                            'labelOptions' => ['class' => 'form-check-label', 'for' => 'agree'],
                            'class' => 'form-check-inputs bg-dark'
                        ]
                    ) ?>
                </div>
                <hr />
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Закрыть</button>
                <?= Html::submitButton('Оформить', ['id' => 'send', 'class' => 'btn btn-vii px-4']) ?>
            </div>
        <?= Html::endForm() ?>
    </div>
</div>
 

<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

    const form = document.querySelector('form#new')
    const email = document.querySelector('input[name="email"]')
    const submit = document.querySelector('#send')
    const parent = document.querySelector('.email');
    const agree = document.getElementById('agree');

    agree.addEventListener("click", () => {
        agree.classList.toggle('bg-dark')
        agree.classList.contains('bg-dark') ? agree.removeAttribute('checked') : agree.setAttribute('checked', true);
        //agree.setAttribute('checked', !agree.checked)
    })
    

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    const swiper = new Swiper(".swiper", {
        effect: "flip",
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });

    async function Send(mail) {
        var headers = new Headers();
        headers.append("Cookie", document.cookie);

        var formdata = new FormData();
        formdata.append("email", mail);

        var options = {
            method: 'POST',
            headers: headers,
            body: formdata,
            redirect: 'follow'
        };
        const send = await fetch("/order", options)
        console.log('Send form:', send)
        return send
    }

    let div = document.createElement('div')
    email.onclick = function(event) {
        event.defaultPrevented
        email.classList.remove('is-invalid')
        div.remove()
    }



    form.onclick = function(event) {
        if(email.value == '') {
            event.preventDefault();
            email.classList.add('is-invalid')
            div.classList.add(...['invalid-feedback', 'd-block'])            
            div.textContent = 'Укажите E-mail адрес!'
            parent.insertBefore(div, email.lastChild);
        } else {
            submit.onclick = function(event) {
                event.defaultPrevented
                Send(email.value)
            }
        }
    };
</script>