<?php
    use yii\grid\GridView;
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;
    use frontend\panel\models\helper\Text;
    use frontend\components\helpers\datetime\Time;

    $totalCount = $dataProvider->totalCount;
    $count = Text::declension($totalCount, 'клип', 'клипа', 'клипов');

    $this->title = 'Список видеоклипов';
    $this->params['breadcrumbs'][] = 'Видеоклипы';
    $this->blocks['header'] = $this->title;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="text-secondary m-0">
                        <strong>
                            Всего:
                        </strong>
                        &#160;<?=$count;?>
                    </p>
                    <small class="text-secondary">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => '{summary}',
                            'summary' => 'Найдено: {count} | {page} из {pageCount}'
                        ]);?>
                    </small> 
                    <?=Html::a(
                        'Добавить видео', 
                        '/panel/video/create', 
                        ['class'=> 'btn bg-purple px-4']
                    );?>                                       
                </div>
            </div>
            <div class="card-body p-0">
                <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}',
                    'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
                    'emptyText' => 'По вашему запросу ничего не найдено', 
                    'tableOptions' => ['class' => 'table table-hover mb-0'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ]
                        ],
                        [
                            'attribute' => 'video_preview',
                            'headerOptions' => [
                                'style' => 'width: 170px'
                            ],
                            'format' => 'raw',
                            'content' => function($data) {
                                $preview = '/data/channel/content/preview/'.$data->video_uuid.'.jpg';
                                return Html::tag(
                                    'div',
                                    Html::img($preview, ['class' => 'w-100 rounded', 'alt' => $data->title]),
                                    [
                                        'class' => 'w-100 bg-black rounded', 
                                        'style' => 'aspect-ratio: 16 / 9'
                                    ]
                                );
                            }
                        ],                        
                        [
                            'attribute' => 'title',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],
                            'content' => function($data) {
                                return Html::a(
                                    $data->title, 
                                    '/panel/video/view/'.$data->video_uuid
                                );
                            }                      
                        ],
                        [
                            'attribute' => 'duration_ms',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],
                            'format' => 'raw',
                            'value' => function($data) {
                                return Time::duration($data['duration_ms']);
                            }
                        ],
                        [
                            'attribute' => 'created_at',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],
                            'content' => function($data) {
                                $time = Yii::$app->formatter->format($data->created_at, 'date');
                                return Html::tag('small', $time, ['class' => 'text-secondary']);
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Управление', 
                            'headerOptions' => ['width' => '80'],
                            'headerOptions' => [
                                'class' => "text-right"
                            ],
                            'contentOptions'=>[
                                'class' => "text-right",
                                'style' => 'vertical-align: middle'
                            ],
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function($url, $model){
                                    $options = [
                                        'data-pjax' => '0',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Посмотреть',
                                        'class' => 'btn text-dark'
                                    ];
                                    return Html::a(
                                        Icons::View(), 
                                        '/panel/video/view/'.$model->video_uuid, 
                                        $options
                                    );
                                },
                                'update' => function ($url,$model) {
                                    $options = [
                                        'data-pjax' => '0',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Редактировать',
                                        'class' => 'btn text-dark'
                                    ];
                                    return Html::a(
                                        Icons::EditNote(), 
                                        '/panel/video/update/'.$model->video_uuid, 
                                        $options
                                    );
                                },
                                'delete' => function ($url,$model) {
                                    $options = [
                                        'aria-label' => 'Удалить',
                                        'data-confirm' => 'Удалить сборник безвозвратно?',
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Удалить?',
                                        'class' => 'btn text-danger'
                                    ];
                                    return Html::a(
                                        Icons::Delete(), 
                                        '/panel/video/delete/'.$model->video_uuid, 
                                        $options
                                    );
                                }
                            ],
                        ]
                    ]
                ]);?>
            </div>
            <div class="card-footer bg-white border-top">
                <?=GridView::widget([
                    'dataProvider' => $dataProvider,  
                    'showHeader' => false,
                    'showOnEmpty' => false,
                    'summary' => 'Страницы: {page} из {pageCount}',
                    'layout' => '<div class="d-flex align-items-center justify-content-between">{pager}<span class="btn">{summary}</span></div>',
                    'pager' => [
                        'maxButtonCount' => 10, // максимум 10 кнопок
                        'options' => ['class' => 'pagination m-0'],
                        'linkOptions' => ['class' => 'page-link'],
                        'pageCssClass' => ['class' => 'page-item'],
                        'registerLinkTags' => false,
                        'nextPageCssClass' => 'page-item next',
                        'prevPageCssClass' => 'page-item prev',
                        'disabledPageCssClass' => 'disabled',
                        'nextPageLabel' => '<div aria-hidden="true">&raquo;</div>', // стрелочка в право
                        'prevPageLabel' => '<div aria-hidden="true">&laquo;</div>', // стрелочка влево
                        'disabledListItemSubTagOptions' => ['tag' => 'div', 'class' => 'page-link', 'aria-label' => 'Next']
                        //'firstPageLabel' => 'Начало',
                        //'lastPageLabel' => 'Конец'
                    ],  
                ]);?>
            </div>
        </div>
    </div>
</div>