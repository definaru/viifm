<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use frontend\components\card\FnCard;
    use frontend\components\data\Telegram;
    $channel = $username === null ? '' : Telegram::getChannelByID($username);
    $name = $model->isNewRecord ? 'Создать' : 'Обновить';
    $color = $model->isNewRecord ? 'btn-success' : 'bg-purple';
    $time = $model->isNewRecord ? time() : $model->created_at;
?>
<div class="row">
    <div class="col-md-9 col-12">
        <?php FnCard::begin([
            'title' => $name,
            'close' => false
        ]); ?>
            <?php $form = ActiveForm::begin(); ?>
                <?=$form->field($model, 'title')->textInput(['value' => $channel["title"] ?? $model->title]);?>
                <?=$form->field($model, 'description')->textarea(['rows' => 8, 'value' => $channel["description"] ?? $model->description]);?>
                <?=$form->field($model, 'avatar')->textInput(['value' => $channel["photo"] ?? $model->avatar]);?>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?=$form->field($model, 'nickname')->textInput(['value' => $channel["username"] ?? $model->nickname]);?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?=$form->field($model, 'theme')->textInput();?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <?=$form->field($model, 'subscribers')->textInput([
                            'value' => $channel["members"] ?? $model->subscribers,
                            'disabled' => true
                        ]);?>
                    </div>
                    <div class="col-12 col-md-4">
                        <?=$form->field($model, 'prr')->textInput();?>
                    </div>
                    <div class="col-12 col-md-4">
                        <?=$form->field($model, 'created_at')->textInput(['value' => $time, 'disabled' => true]);?>
                    </div>
                </div>
                <hr />
                <?=Html::submitButton($name, ['class' => 'btn px-5 '.$color]);?>
            <?php ActiveForm::end(); ?>
        <?php FnCard::end(); ?>
    </div>
</div>