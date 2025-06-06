<?php
    use yii\web\View;
    use yii\bootstrap5\Html;
    use yii\widgets\ActiveForm;
    use frontend\components\card\FnCard;
    use kartik\select2\Select2;
    use frontend\models\Collections;

    Yii::$app->params['bsDependencyEnabled'] = false;

    $listtags = Collections::getAllTags();
    $deleteImage = $model->isNewRecord || empty($model->image) ? '' : 
        Html::button('Заменить картинку', ['class' => 'btn btn-default px-4 ml-2', 'id' => 'delete']);

    $relize = $model->isNewRecord ? 'd-none' : 'row';
    $label = $model->isNewRecord || empty($model->image) ? 'Обложка сборника' : false;
    $type = $model->isNewRecord || empty($model->image) ? 'file' : 'hidden';
    $button = $model->isNewRecord ? 'Создать' : 'Сохранить';
    $color = $model->isNewRecord ? 'btn bg-purple px-5' : 'btn btn-success px-5';
    $model->tags = explode(', ', $model->tags);
    $image = isset($model->image) ? 
        $model->image : 
        'https://dummyimage.com/800x800/f4f6f9/343a40&text=No picture';

    $js = <<<JS

    let input = document.getElementById('image-upload');
    let deleteimage = document.querySelector('#delete');

    deleteimage?.addEventListener('click', (event) => {
        if (input.type === 'hidden') {
            input.type = 'file';
            deleteimage.innerText = 'Отмена';
        } else {
            input.type = 'hidden';
            deleteimage.innerText = 'Заменить картинку';
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
    'title' => 'Данные о сборнике',
    'close' => false
]); ?>
    <div class="row">
        <div class="col-12 col-md-5">
            <?=Html::img($image, [
                'id' => 'result',
                'class' => 'w-100 rounded',
                'alt' =>'Picture' 
            ]);?>
        </div>
        <div class="col-12 col-md-7">
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
                <?=$form->field($model, 'name')->textInput();?>
                <?=$form->field($model, 'tags')->widget(Select2::class, [
                    'data' => $listtags,
                    'size' => Select2::LARGE,
                    'language' => 'ru',
                    'options' => ['placeholder' => 'Выберите хэш теги...', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                        'tokenSeparators' => [',', ' '],
                        'maximumInputLength' => 10
                    ],
                ]);?>
                <div class="<?=$relize;?>">
                    <div class="col-12 col-md-6">
                        <?=$form->field($model, 'uid')->textInput();?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?=$form->field($model, 'url')->textInput();?>
                    </div>
                </div>
                <?=$form->field($model, 'image')->textInput(['id' => 'image-upload', 'type' => $type])->label($label);?>
                <?=Html::submitButton($button, ['class' => $color]);?><?=$deleteImage;?>
            <?php ActiveForm::end();?>
        </div>
    </div>
<?php FnCard::end(); ?>