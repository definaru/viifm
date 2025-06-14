<?php
    use yii\helpers\Url;
    use yii\bootstrap5\Html;
    use yii\bootstrap5\ActiveForm;
    use frontend\components\icons\Icons;
    use frontend\components\data\SocialLinkData;

    $this->title = Yii::t('vii', 'Contacts');
    $this->params['breadcrumbs'][] = $this->title;

    $url = Url::canonical();
    $description = Yii::t('vii', 'description_contacts');
    $social_link_class = 'btn btn-love px-4 d-inline-flex justify-content-center align-items-center gap-2';
    $social_link = SocialLinkData::links();

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'контакты, music, vii, enigma, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => 'Vii FM. Красивая музыка']);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    //$this->registerMetaTag(['property' => 'og:image', 'content' => $url.'/data/image/353425643654364456___.jpg']);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);

    $items = [
        'Размещение рекламы на канале' => Yii::t('vii', 'Ad placement on the channel'),
        'Жалоба или замечаниe' => Yii::t('vii', 'Complaint or remark'),
        'Предложение и пожелание' => Yii::t('vii', 'Suggestion and Request'),
        'Вопросы по товарам' => Yii::t('vii', 'Product Questions'),
        'Вопросы по услугам' => Yii::t('vii', 'Service Questions'),
        'Другое' => Yii::t('vii', 'Other')
    ];
    //  offset-md-3
?>
<div class="row align-items-center my-5">
    <div class="col-md-7">
        <div class="d-grid gap-4 pe-md-5 pe-0 text-center text-md-start mb-5 mb-md-0 mx-3 mx-md-0 position-relative z-2">
            <?=Html::tag('h1', $this->title, ['class' => 'display-3 fw-bold m-0']);?>
            <?=Html::tag('p', Yii::t('vii', 'business needs'), ['class' => 'fs-5 text-body-secondary fw-lighter m-0']);?>  
            <?=Html::tag(
                'p', 
                Yii::t('vii', 'agree_contacts', 
                    [
                        'Send' => Html::tag(
                            'strong', 
                            '"'.Yii::t('vii', 'Send').'"'
                        )
                    ]
                ), 
                ['class' => 'text-body-secondary']
            );?>  

            <?=Html::tag('p', Icons::Location(30, 'text-vii').' '.Yii::$app->params['address']);?>

            <div class="d-flex gap-2 align-items-center">
                <?php foreach($social_link as $item) { $icon = $item['icon']; ?>
                    <?=Html::a(
                        Icons::$icon($item['size_icon']).' '.$item['name'],
                        $item['href'],
                        [
                            'class' => $social_link_class,
                            'target' => '_blank'
                        ]
                    );?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card p-md-5 p-2 image-flame">
            <div class="card-body position-relative z-3">
                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
                    <div class="alert alert-success text-center border-0 m-0 d-inline-flex justify-content-center align-items-center gap-2 w-100">
                        <?=Icons::Check(20);?>
                        <?=Html::tag('strong', Yii::t('vii', 'Successfully'));?>
                        <?=Html::tag('span', Yii::t('vii', 'Message received'));?>
                    </div>
                <?php else: ?>
                    <?php $form = ActiveForm::begin([
                        'id' => 'contact-form',
                        // 'data-pjax' => '',
                        'enableAjaxValidation' => true,
                        'validateOnBlur'       => false,
                        'validateOnType'       => false,
                        'validateOnSubmit'     => false
                    ]); ?>
                        <?= $form->field($model, 'name')->textInput([
                            'placeholder' => Yii::t('vii', 'Your name')
                        ])->label(false);?>

                        <?= $form->field($model, 'email')->textInput([
                            'placeholder' => Yii::t('vii', 'Your e-mail'), 
                            'autocomplete' => 'off'
                        ])->label(false);?>

                        <?= $form->field($model, 'subject')->dropDownList(
                            $items, 
                            ['prompt' => Yii::t('vii', 'Subject line')
                        ])->label(false);?>

                        <?= $form->field($model, 'body')->textarea([
                            'placeholder' => Yii::t('vii', 'Message'), 
                            'rows' => 6]
                        )->label(false);?>
                        
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
                            ])->label(false);?> 
                        -->
                        <div class="d-grid text-center gap-3">
                            <?=Html::submitButton(
                                Yii::t('vii', 'Send'), 
                                ['class' => 'btn btn-lg btn-vii', 'name' => 'contact-button']
                            );?> 
                            <?=Html::tag('small', Icons::Lock(16).Yii::t('vii', 'data security'));?>                     
                        </div>
                    <?php ActiveForm::end(); ?>                     
                <?php endif ; ?>
            </div>
        </div>
    </div>
</div>
