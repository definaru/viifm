<?php
    use yii\web\View;
    use yii\bootstrap5\Html;
    use yii\widgets\ActiveForm;
    use frontend\components\card\FnCard;
    use common\models\User;


    $button = $model->isNewRecord ? 'Создать' : 'Сохранить';
    $color = $model->isNewRecord ? 'btn bg-purple px-5' : 'btn btn-success px-5';
    $label = $model->isNewRecord || empty($model->avatar) ? 'Аватарка' : false;
    $type = $model->isNewRecord || empty($model->avatar) ? 'file' : 'hidden';
    $deleteImage = $model->isNewRecord || empty($model->avatar) ? '' : 
        Html::button('Заменить аватарку', ['class' => 'btn btn-default px-4 mb-2', 'id' => 'delete']);
    $image = User::getUserAvatar($model->avatar);
    // isset($model->avatar) ? 
    //     '/admin'.$model->avatar : 
    //     'https://dummyimage.com/800x800/f4f6f9/343a40&text=No picture';

    $js = <<<JS
        let input = document.getElementById('image-upload');
        let deleteimage = document.querySelector('#delete');
        deleteimage?.addEventListener('click', (event) => {
            if (input.type === 'hidden') {
                input.type = 'file';
                deleteimage.innerText = 'Отмена';
            } else {
                input.type = 'hidden';
                deleteimage.innerText = 'Заменить аватарку';
            }
        });
    
        input.addEventListener('change', function() {
            let file = this.files[0];
            let reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById('result').src = reader.result;
            }
            reader.readAsDataURL(file);
        });
    JS;
    $this->registerJs($js, View::POS_END);
?>
<?php FnCard::begin([
    'title' => 'Профиль',
    'close' => false
]); ?>
    <?php $form = ActiveForm::begin([
        'id' => 'collections',
        'validateOnBlur' => false,
        'validateOnType' => false,
        'validateOnSubmit' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
            'class' => 'needs-validation',
            'novalidate' => true
        ],
    ]);?>
        <div class="row">
            <div class="col-3">
                <?=Html::img($image, [
                    'id' => 'result',
                    'class' => 'w-100 rounded border',
                    'alt' =>'Picture' 
                ]);?>
                <?=$form->field($model, 'avatar')->textInput(['id' => 'image-upload', 'type' => $type])->label($label);?>
                <?=$deleteImage;?>                
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <?=$form->field($model, 'firstname')->textInput();?>
                    </div>
                    <div class="col-12 col-md-4">
                        <?=$form->field($model, 'lastname')->textInput();?>
                    </div>
                    <div class="col-12 col-md-8">
                        <?=$form->field($model, 'account')->textInput();?>
                    </div>
                    <div class="col-12 col-md-8">
                        <?=$form->field($model, 'adress')->textInput();?>
                    </div>
                </div>                
            </div>
        </div>


        <?=$form->field($model, 'about')->textarea(['rows' => 5]);?>
        <div class="row">
            <div class="col-12 col-md-3"><?=$form->field($model, 'position')->textInput();?></div>
            <div class="col-12 col-md-3"><?=$form->field($model, 'phone')->textInput();?></div>
            <div class="col-12 col-md-3"><?=$form->field($model, 'telegram')->textInput();?></div>
            <div class="col-12 col-md-3"><?=$form->field($model, 'skype')->textInput();?></div>
        </div>
        
        <?php // =$form->field($model, 'useragent')->textInput();?>
        <hr />
        <?=Html::submitButton($button, ['class' => $color]);?>
    <?php ActiveForm::end();?>
<?php FnCard::end(); ?>