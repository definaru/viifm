<?php
    use yii\web\View;
    use yii\helpers\Json;
    use yii\bootstrap5\Html;
    use yii\bootstrap5\ActiveForm;
    use frontend\components\toastr\Toastr;

    $this->title = Yii::t('vii', 'Request password reset');

    $text = Json::encode(Yii::t('vii', 'Check reset password'));

    $success = <<<JS
        toastr.success(
            $text, '', 
            {
                positionClass: 'toast-bottom-left',
                timeOut: 5000
            }
        );    
    JS;


    $script = Yii::$app->session->hasFlash('success') ? $success : '';

    Toastr::Widget();
    $this->registerJs($script, View::POS_END); 

    $email = [
        'template' => '
        <div class="input-group mb-2">
            {input}
            <div class="input-group-append">
                <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 -960 960 960" fill="#999">
                        <path d="M172.31-180Q142-180 121-201q-21-21-21-51.31v-455.38Q100-738 121-759q21-21 51.31-21h615.38Q818-780 839-759q21 21 21 51.31v455.38Q860-222 839-201q-21 21-51.31 21H172.31ZM480-457.69 160-662.31v410q0 5.39 3.46 8.85t8.85 3.46h615.38q5.39 0 8.85-3.46t3.46-8.85v-410L480-457.69Zm0-62.31 313.85-200h-627.7L480-520ZM160-662.31V-720v467.69q0 5.39 3.46 8.85t8.85 3.46H160v-422.31Z"/>
                    </svg>
                </div>
            </div>
            {error}{hint}
        </div>',
        'options' => ['class' => '']
    ];
?>
<div class="card-body login-card-body">
    <?=Html::tag(
        'p', 
        Yii::t('vii', 'Please fill out your email'), 
        ['class' => 'login-box-msg']
    );?>
    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
        <?=$form->field($model, 'email', $email)
            ->textInput(['placeholder' => Yii::t('vii', 'Email')])
            ->label(false);
        ?>
        <?php if(Yii::$app->session->hasFlash('error')) { ?>
            <p class="text-danger"><?=Yii::t('vii', 'No reset password');?></p>
        <?php } ?>
        <div class="form-group">
            <?=Html::submitButton(
                Yii::t('vii', 'Request new password'), 
                ['class' => 'btn bg-purple btn-block']
            );?>
        </div>
    <?php ActiveForm::end(); ?>
    <div class="text-center">
        <p class="mt-3 mb-1">
            <?= Html::a(
                Yii::t('vii', 'Register a new account'), 
                '/auth/signup', 
                ['class' => 'text-purple text-underline-offset']
            );?>
        </p>
        <p class="mb-0">
            <?= Html::a(
                Yii::t('vii', 'Login'), 
                '/auth/signin', 
                ['class' => 'text-purple text-underline-offset']
            );?>
        </p>
    </div>
</div>
<hr class="m-0" />