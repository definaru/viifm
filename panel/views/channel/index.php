<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use frontend\components\icons\Icons;
    use frontend\panel\models\helper\Text;

    $totalCount = $dataProvider->totalCount;
    $count = Text::declension($totalCount, 'канал', 'канала', 'каналов');

    $this->title = 'Список каналов';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0 py-2 px-3">
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
                        'Добавить канал', 
                        ['create'], 
                        ['class'=> 'btn btn-sm bg-purple px-4']
                    );?>                                       
                </div>
            </div>
            <div class="card-body p-0">
                <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}',
                    'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger m-0'],
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
                            'attribute' => 'avatar',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::img($data->avatar, [
                                    'class' => 'profile-user-img img-fluid img-circle border-success', 
                                    'style' => 'width: 50px', 
                                    'alt' => $data->title
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'nickname',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],   
                            'content' => function ($data) {
                                return Html::a(
                                    $data->nickname, 
                                    'https://t.me/'.$data->nickname,
                                    ['target' => '_blank']
                                );
                            }                      
                        ],
                        [
                            'attribute' => 'title',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],                            
                        ],
                        [
                            'attribute' => 'subscribers',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],
                            'content' => function ($data) {
                                $options = ['class' => 'badge'];
                                if ($data->subscribers > 10000) {
                                    Html::addCssClass($options, 'badge-success');
                                } else {
                                    Html::addCssClass($options, 'badge-danger');
                                }
                                return Html::tag(
                                    'span', 
                                    number_format($data->subscribers, 0, '', ' '), 
                                    $options
                                );
                            }
                        ],
                        //'description:ntext',
                        //'theme',
                        //'engagement_index',
                        [
                            'attribute' => 'created_at',
                            'contentOptions' => [
                                'style' => 'vertical-align: middle'
                            ],
                            'content' => function ($data) {
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
                                        '/panel/channel/view/'.$model->id, 
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
                                        '/panel/channel/update/'.$model->id, 
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
                                        '/panel/channel/delete/'.$model->id, 
                                        $options
                                    );
                                }
                            ],
                        ]
                    ],
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