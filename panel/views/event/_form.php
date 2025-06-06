<?php
/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$button = $model->isNewRecord ? 'Создать' : 'Сохранить';
$color = $model->isNewRecord ? 'btn bg-purple px-5' : 'btn btn-dark px-5';

$delete = $model->isNewRecord ? '' :
    Html::a('Удалить', '/panel/event/delete?id='.$model->id, [
        'class' => 'btn btn-danger ml-2',
        'data-confirm' => 'Выбранная записи будут полностью удалена. Удалить?',
        'data-method' =>'post'
    ]);
?>

<div class="event-form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput([
            'placeholder' => 'Название',
            'class' => 'form-control font-weight-bold text-dark border-0'
        ])->label(false);?>

        <?= $form->field($model, 'description')->textArea([
            'placeholder' => 'Описание...',
            'class' => 'form-control text-muted border-0'
        ])->label(false);?>

        <?= $form->field($model, 'type')->dropDownList(
            [
                '0' => 'Задача', 
                '1' => 'Мероприятие',
                '2' => 'Сборник',
                '3' => 'Новости'
            ],
            ['prompt' => 'Тип события...', 'class' => 'custom-select']
        )->label(false);?>

        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'start')->textInput(['id' => 'start', 'type' => 'datetime-local']) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'end')->textInput(['id' => 'end', 'type' => 'datetime-local']) ?>
            </div>
        </div>

        <?=$form->field($model, 'color')->textInput(['type' => 'color', 'class' => 'form-control p-0']);?>

        <hr />

        <div class="form-group m-0">
            <?=Html::submitButton($button, ['class' => $color]);?>
            <?=$delete;?>
        </div>
    <?php ActiveForm::end(); ?>
</div>