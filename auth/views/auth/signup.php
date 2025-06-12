<?php    
    use yii\web\View; 
    use yii\bootstrap5\Html;
    use yii\bootstrap5\ActiveForm;
    $this->title = Yii::t('vii', 'Sign Up');

    $code = Yii::$app->request->get('code');
    $title = $code ?
        Yii::t('vii', 'Sign In').'...' : 
        Yii::t('vii', 'Register a new account');

    $body = $code ? 'd-none' : '';
    $loading = $code ? 'd-flex justify-content-center py-3' : 'd-none';
    $js = $code ? "
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const code = urlParams.get('code');
        if (code) {
            document.getElementById('form-signup').submit();
        }
    }
    " : '';
    $this->registerJs($js, View::POS_END);

    $g_name = isset($res["email"]) ? explode('@', $res["email"])[0] :  '';
    $g_email = isset($res["email"]) ? $res["email"] : '';
    $g_password = isset($res["id"]) ? $res["id"] : '';

    $username = [
        'template' => '
        <div class="input-group mb-3">
            {input}
            <div class="input-group-append">
                <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 -960 960 960" fill="#999">
                        <path d="M480-492.31q-57.75 0-98.87-41.12Q340-574.56 340-632.31q0-57.75 41.13-98.87 41.12-41.13 98.87-41.13 57.75 0 98.87 41.13Q620-690.06 620-632.31q0 57.75-41.13 98.88-41.12 41.12-98.87 41.12ZM180-187.69v-88.93q0-29.38 15.96-54.42 15.96-25.04 42.66-38.5 59.3-29.07 119.65-43.61 60.35-14.54 121.73-14.54t121.73 14.54q60.35 14.54 119.65 43.61 26.7 13.46 42.66 38.5Q780-306 780-276.62v88.93H180Zm60-60h480v-28.93q0-12.15-7.04-22.5-7.04-10.34-19.11-16.88-51.7-25.46-105.42-38.58Q534.7-367.69 480-367.69q-54.7 0-108.43 13.11-53.72 13.12-105.42 38.58-12.07 6.54-19.11 16.88-7.04 10.35-7.04 22.5v28.93Zm240-304.62q33 0 56.5-23.5t23.5-56.5q0-33-23.5-56.5t-56.5-23.5q-33 0-56.5 23.5t-23.5 56.5q0 33 23.5 56.5t56.5 23.5Zm0-80Zm0 384.62Z"/>
                    </svg>
                </div>
            </div>
            {error}{hint}
        </div>'
    ];

    $email = [
        'template' => '
        <div class="input-group mb-3">
            {input}
            <div class="input-group-append">
                <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 -960 960 960" fill="#999" stroke="#000" stroke-width="5">
                        <path d="M187.52-205.54q-25.77 0-43.57-17.8t-17.8-43.58v-426.16q0-25.78 17.8-43.58 17.8-17.8 43.57-17.8h584.96q25.77 0 43.57 17.8t17.8 43.58v426.16q0 25.78-17.8 43.58-17.8 17.8-43.57 17.8H187.52ZM480-477.92 163.08-685.23v418.15q0 10.77 6.92 17.7 6.92 6.92 17.69 6.92h584.62q10.77 0 17.69-6.92 6.92-6.93 6.92-17.7v-418.15L480-477.92Zm0-41.46 304-198.16H176l304 198.16ZM163.08-685.23v-32.31 450.46q0 10.77 6.92 17.7 6.92 6.92 17.69 6.92h-24.61v-442.77Z"/>
                    </svg>
                </div>
            </div>
            {error}{hint}
        </div>'
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
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?=$form->field($model, 'username', $username)
                ->textInput([
                    'placeholder' => Yii::t('vii', 'Full name'), 
                    'value' => $g_name
                ])
                ->label(false);
            ?>
            <?=$form->field($model, 'email', $email)
                ->textInput([
                    'placeholder' => Yii::t('vii', 'Email'), 
                    'value' => $g_email
                ])
                ->label(false);
            ?>
            <?=$form->field($model, 'password', $password)
                ->passwordInput([
                    'placeholder' => Yii::t('vii', 'Password'), 
                    'value' => $g_password
                ])
                ->label(false);
            ?>
            <div class="form-group">
                <?=Html::submitButton(
                    Yii::t('vii', 'Sign Up'), 
                    [
                        'class' => 'btn bg-purple btn-block', 
                        'name' => 'signup-button'
                    ]
                );?>
            </div>
        <?php ActiveForm::end(); ?>
        <div class="text-center">
            <p class="mb-0">
                <?= Html::a(
                    Yii::t('vii', 'Login'), 
                    '/auth/signin', 
                    ['class' => 'text-purple text-underline-offset']
                );?>
            </p>             
        </div>
    </div>
</div>
<hr class="m-0" />
<?php /*
<?php $this->beginBlock('auth') ?>
    <pre><?php var_dump($res);?></pre>
<?php $this->endBlock() ?>
*/ ?>

