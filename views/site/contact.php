<?php
    use yii\bootstrap5\Html;
    use yii\bootstrap5\ActiveForm;
    use yii\captcha\Captcha;

    $this->title = 'Контакты';
    $this->params['breadcrumbs'][] = $this->title;
    $items = [
        'Размещение рекламы на канале' => 'Размещение рекламы на канале',
        'Жалоба или замечаниe' => 'Жалоба или замечаниe',
        'Предложение и пожелание'=> 'Предложение и пожелание',
        'Другое'=> 'Другое'
    ];
    //  offset-md-3
?>
<div class="row align-items-center my-5">
    <div class="col-md-7">
        <div class="d-grid gap-4 pe-md-5 pe-0 text-center text-md-start mb-5 mb-md-0 mx-3 mx-md-0 position-relative z-2">
            <?=Html::tag('h1', $this->title, ['class' => 'display-3 fw-bold m-0']);?>
            <p class="fs-5 text-body-secondary fw-lighter m-0">
                Если у вас есть деловые запросы или другие вопросы, пожалуйста, 
                заполните следующую форму, чтобы связаться с нами. Спасибо.
            </p>
            <p class="text-body-secondary">* Нажимая кнопку <strong>"Отправить"</strong> вы соглашаетесь на обработку <br/>
            персональных данных и на e-mail рассылку новостей нашего канала.</p>
            <div>
                <a href="https://t.me/viifm_lux" class="btn btn-love px-4 d-inline-flex justify-content-center align-items-center gap-2" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                    </svg> Telegram
                </a>            
            </div>
        </div>
    <!-- <script 
        async 
        src="https://telegram.org/js/telegram-widget.js?22" 
        data-telegram-post="vii_chats/1066" 
        data-width="100%" 
        data-color="DE3163"
        data-dark="1"
    ></script> -->
    </div>
    <div class="col-md-5">
        <div class="card p-md-5 p-2 image-flame">
            <div class="card-body position-relative z-3">
                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'enableAjaxValidation'   => true,
                    'validateOnBlur'         => false,
                    'validateOnType'         => false,
                    'validateOnSubmit'       => false
                ]); ?>
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Ваше имя'])->label(false);?>
                    <?= $form->field($model, 'email')->textInput([
                        'placeholder' => 'Ваш e-mail', 
                        'autocomplete' => 'off'
                    ])->label(false);?>
                    <?= $form->field($model, 'subject')->dropDownList($items, ['prompt' => 'Тема обращения...'])->label(false);?>
                    <?= $form->field($model, 'body')->textarea(['placeholder' => 'Сообщение...', 'rows' => 6])->label(false);?>
                    <!-- $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row d-flex align-items-center">
                            <div class="col-lg-3">{image}</div>
                            <div class="col-lg-5">{input}</div>
                            <div class="col-lg-4 d-grid">'.Html::submitButton(
                                'Отправить', 
                                ['class' => 'btn btn-lg btn-light', 'name' => 'contact-button']
                            ).'</div>
                        </div>',
                        'options' => ['placeholder' => 'Введите код капчи...'],
                    ])->label(false);?> -->
                    <div class="d-grid text-center gap-3">
                        <?=Html::submitButton(
                            'Отправить', 
                            ['class' => 'btn btn-lg btn-vii', 'name' => 'contact-button']
                        );?>  
                        <small>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>
                            Ваши данные защищены. Мы не занимаемся распространением персональных данных.
                        </small>                      
                    </div>
                <?php ActiveForm::end(); ?>        
            </div>
        </div>
    </div>
</div>
