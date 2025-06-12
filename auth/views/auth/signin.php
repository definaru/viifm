<?php 
    use yii\web\View; 
    use yii\helpers\Json;
    use yii\bootstrap5\Html;
    use yii\bootstrap5\ActiveForm;
    use frontend\components\data\GoogleAuth;
    use frontend\components\icons\Icons;
    use frontend\components\toastr\Toastr;

    $text = Json::encode(Yii::t('vii', 'Thank you for registration'));
    $js = <<<JS
    toastr.success(
        $text, '', 
        {
            positionClass: 'toast-bottom-left',
            timeOut: 5000
        }
    );    
    JS;

    $action = Yii::$app->session->hasFlash('success') ? $js : '';

    Toastr::Widget();
    $this->registerJs($action, View::POS_END); 

    Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapAsset'] = false; 
    
    $login = Yii::$app->request->get('login');
    $title = $login ? 
        Yii::t('vii', 'Sign In').'...' : 
        Yii::t('vii', 'Sign in to start your session');
    $body = $login ? 'd-none' : '';
    $loading = $login ? 'd-flex justify-content-center py-3' : 'd-none';
    $js = $login ? "
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const login = urlParams.get('login');

        if (login) {
            document.getElementById('login-form').submit();
        }
    }
    " : '';
    $this->registerJs($js, View::POS_END);

    $g_mail = isset($res["email"]) ? $res["email"] : '';
    $g_password = isset($res["sub"]) ? $res["sub"] : '';

    $this->title = Yii::t('vii', 'Sign In');
    $this->registerCss('
        .social-auth-links p:after {
            content: "";
            position: absolute;
            width: 37%;
            height: 1px;
            background: #ddd;
            right: 20px;
            margin-top: 13px;
        }
        .social-auth-links p:before {
            content: "";
            position: absolute;
            width: 37%;
            height: 1px;
            background: #ddd;
            left: 20px;
            margin-top: 13px;
        }
    ');   
    $username = [
        'template' => '
        <div class="input-group mb-2">
            {input}
            <div class="input-group-append">
                <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 -960 960 960" fill="#999" stroke="#000" stroke-width="5">
                        <path d="M187.52-205.54q-25.77 0-43.57-17.8t-17.8-43.58v-426.16q0-25.78 17.8-43.58 17.8-17.8 43.57-17.8h584.96q25.77 0 43.57 17.8t17.8 43.58v426.16q0 25.78-17.8 43.58-17.8 17.8-43.57 17.8H187.52ZM480-477.92 163.08-685.23v418.15q0 10.77 6.92 17.7 6.92 6.92 17.69 6.92h584.62q10.77 0 17.69-6.92 6.92-6.93 6.92-17.7v-418.15L480-477.92Zm0-41.46 304-198.16H176l304 198.16ZM163.08-685.23v-32.31 450.46q0 10.77 6.92 17.7 6.92 6.92 17.69 6.92h-24.61v-442.77Z"/>
                    </svg>
                </div>
            </div>
            {error}{hint}
        </div>',
        'options' => ['class' => '']
    ];

    $password = [
        'template' => '
        <div class="input-group mb-3">
            {input}
            <div class="input-group-append">
                <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 -960 960 960" fill="#999" stroke="#000" stroke-width="5">
                        <path d="M267.08-126.15q-25.58 0-43.56-17.98-17.98-17.99-17.98-43.56v-347.08q0-25.58 17.98-43.56 17.98-17.98 43.56-17.98h57.23v-78.54q0-65.34 45.29-110.63 45.28-45.29 110.4-45.29t110.4 45.29q45.29 45.29 45.29 110.63v78.54h57.23q25.58 0 43.56 17.98 17.98 17.98 17.98 43.56v347.08q0 25.57-17.98 43.56-17.98 17.98-43.56 17.98H267.08Zm0-36.93h425.84q10.77 0 17.7-6.92 6.92-6.92 6.92-17.69v-347.08q0-10.77-6.92-17.69-6.93-6.92-17.7-6.92H267.08q-10.77 0-17.7 6.92-6.92 6.92-6.92 17.69v347.08q0 10.77 6.92 17.69 6.93 6.92 17.7 6.92Zm212.86-140q24.51 0 41.36-16.78 16.85-16.79 16.85-41.31 0-24.52-16.78-41.37-16.79-16.84-41.31-16.84-24.51 0-41.36 16.78-16.85 16.79-16.85 41.3 0 24.52 16.78 41.37 16.79 16.85 41.31 16.85ZM361.23-596.31h237.54v-78.86q0-49.29-34.62-83.98-34.62-34.7-84.08-34.7-49.45 0-84.15 34.69-34.69 34.69-34.69 84.24v78.61ZM242.46-163.08v-396.3 396.3Z"/>
                    </svg>
                </div>
            </div>
            {error}{hint}
        </div>'
    ];

    $checkbox = [
        'template' => "<div class='icheck-purple'>{input} {label}</div>",
        'class' => 'text-primary',
        'uncheck' => null
    ];
?>
<div class="card-body login-card-body">
    <div class="<?=$loading;?>">
        <div class="spinner-border text-purple" role="status">
            <?=Html::tag(
                'span', 
                Yii::t('vii', 'Loading').'...', 
                ['class' => 'sr-only']
            );?>
        </div>
    </div>
    <?=Html::tag('p', $title, ['class' => 'login-box-msg']);?>
    <div class="<?=$body;?>">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?=$form->field($model, 'email', $username)
                ->textInput([
                    'value' => $g_mail, 
                    'type' => 'email', 
                    'placeholder' => Yii::t('vii', 'Email')
                ])
                ->label(false);
            ?>
            <?=$form->field($model, 'password', $password)
                ->passwordInput([
                    'value' => $g_password, 
                    'placeholder' => Yii::t('vii', 'Password')
                ])
                ->label(false);
            ?>
            <div class="row">
                <div class="col-7">
                    <?=$form->field($model, 'rememberMe')
                        ->checkbox($checkbox)
                        ->label(Yii::t('vii', 'Remember Me'));
                    ?>
                </div>
                <div class="col-5">
                    <?= Html::submitButton(Yii::t('vii', 'Login'), [
                        'class' => 'btn bg-purple btn-block', 
                        'name' => 'login-button'
                    ]);?>
                </div>
            </div>
            <div class="social-auth-links text-center mb-3">
                <?=Html::tag('p', Yii::t('vii', 'OR'));?>
                <?php /*
                <a href="#" class="btn btn-block btn-default">
                    <?=Icons::SigninFacebook();?>
                    <?=Yii::t('vii', 'Sign in using Facebook');?>
                </a>
                */ ?>

                <a href="<?=GoogleAuth::createGoogleAuthUrl()?>" class="btn btn-block btn-default">
                    <?=Icons::SigninGoogle();?> 
                    <?=Yii::t('vii', 'Sign in using Google');?>
                </a>
            </div>
            <div class="text-center">
                <p class="mb-1">
                    <?=Html::a(
                        Yii::t('vii', 'I forgot my password'), 
                        '/auth/request-password-reset', 
                        ['class' => 'text-purple text-underline-offset']
                    );?>
                </p>
                <p class="mb-0">
                    <?=Html::a(
                        Yii::t('vii', 'Register a new account'), 
                        '/auth/signup', 
                        ['class' => 'text-purple text-underline-offset']
                    );?>
                </p>                
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<hr class="m-0" />

<?php /*
<?php $this->beginBlock('auth') ?>
    <pre><?php var_dump($res);?></pre>
<?php $this->endBlock() ?>
*/ ?>
