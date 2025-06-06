<?php
    use yii\bootstrap5\Html;
    use frontend\components\card\FnCard;
    use frontend\components\icons\Icons;
    use frontend\panel\models\helper\PanelWord;
    use frontend\components\helpers\useragentparser\UserAgent;

    $this->title = 'Account';
    //$this->params['breadcrumbs'][] = ['label' => 'Подкатегория', 'url' => '/category'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Account';

    $browser = 'Текущее устройство: '.UserAgent::view($model->useragent);
    $formatter = Yii::$app->formatter;
    $name = $model->firstname.' '.$model->lastname;
    $setting = [
        [
            'href'=> '/panel/profile/'.$model->id.'/edit', 
            'title' => 'Редактировать',
            'divider' => '-'
        ],
        [
            'href'=> '/panel/profile/'.$model->id.'/delete', 
            'title' => 'Удалить',
            'divider' => ''
        ],
    ];
    $tools = $model->user->id === Yii::$app->user->identity->id ? $setting : [];
    $this->registerCss('
        .profile-user-img {
            border: 5px solid #28a745;
        }
    ');
    // Yii::$app->request->get('account')
?>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'Данные профиля', 
            'date' => $tools,
            'close' => false,
            'footer' => $browser
        ]); ?>
        <?php if($model === null) : ?>
            <div class="row">
                <div class="col-12">
                    <p>Профиль пользователя не найден. </p>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Создать ?
                    </button>
                    <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Default Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>One fine body…</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12 col-md-2 box-profile">
                    <?=Html::img($model->avatar, [
                        'class' => 'profile-user-img img-fluid img-circle w-100',
                        'alt' => $name
                    ]);?>
                </div>
                <div class="col-12 col-md-6">
                    <h4>
                        <?=Html::tag(
                            'span', 
                            '@'.$model->account, 
                            ['class' => 'badge badge-success']
                        );?>
                    </h4>
                    <small><?=$model->position;?></small>
                    <?=Html::tag(
                        'h3', 
                        $name, 
                        ['class' => 'profile-username mt-0']
                    );?>
                    <?=Html::tag(
                        'span', 
                        'Аккаунт подтверждён', 
                        ['class' => 'badge bg-purple px-2']
                    );?>
                    
                    <?=Html::tag(
                        'p', 
                        $model->about, 
                        ['class' => 'text-muted mt-3']
                    );?>
                    <div class="text-muted">
                        <p><?=Icons::Location(18, 'text-dark').' '.$model->adress;?></p>
                        <p>
                            <?=Icons::Calendar(18, 'text-dark').
                                ' Создан: '.
                                $formatter->format($model->created_at, 'date').
                                $formatter->asTime($model->created_at, 'php:, H:i')
                            ;?>
                        </p>                        
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <h4>Контакты:</h4>
                    <ul class="pl-3">
                        <li class="mb-2"><?=Icons::Phone(18);?> <?=PanelWord::phone($model->phone);?></li>
                        <li class="mb-2"><?=Icons::Mail(18);?> <?=Html::mailto($model->user->email, null, ['target' => '_blank']);?></li>
                        <li class="mb-2"><?=PanelWord::telegram($model->telegram);?></li>
                        <li class="mb-2"><?=PanelWord::skype($model->skype);?></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <?php FnCard::end(); ?>
    </div>
</div>