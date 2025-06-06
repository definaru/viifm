<?php
    use yii\grid\GridView;
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;
    use frontend\components\helpers\datetime\Time;

    $this->registerCss('
        thead {
            font-size: 14px;
            background: #f8f6f9
        }
        thead a {color: #909090 !important}
        thead th {
            padding: .65rem .75rem !important;
            border-top: 0px solid #dee2e6 !important;
            border-bottom: 1px solid #dee2e6 !important;
        }    
        .page-link {color: #6610f2}
    ');
?>
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
            'attribute' => 'artist',
            'contentOptions' => function (){
                return ['class' => 'p-0'];
            },
            'content' => function($data) 
            {
                $album = $data['image'] === null ? Icons::MusicNote(40) : Html::img($data['image'], ['class' => 'w-100', 'alt' => '...']);
                return '
                    <div class="info-box m-0 shadow-none border-0" style="background: transparent">
                        <a 
                            href="/panel/playlist/music/'.$data['uid'].'" 
                            class="rounded-lg border info-box-icon bg-purple overflow-hidden"
                            style="aspect-ratio: 1/1;flex: none;width: 70px;height: 70px"
                        >
                            '.$album.'
                        </a>
                        <div class="d-flex align-items-center ml-3">
                            <div>
                                <span class="font-weight-bold text-purple">'.$data['artist'].'</span> - '.Html::tag('span', $data['name']).'
                            </div>
                        </div>
                    </div>
                ';
            }
        ],
        [
            'attribute' => 'album',
            'contentOptions' => function (){
                return [
                    'class' => 'align-middle', 
                    'style' => 'width: 400px'
                ];
            },
            'content' => function($data) {
                return Html::tag('i', $data['album']);
            }
        ],
        [
            'attribute' => 'id_collection',
            'contentOptions' => function (){
                return ['class' => 'align-middle'];
            },
            'content' => function($data) {
                $success = Html::tag('span', '✅( есть )', ['class' => 'badge badge-success']);
                $album = Html::a($success, '/panel/playlist/collections/view/'.$data['id_collection'], ['target' => '_blank']);
                $null = Html::tag('span', '❌ ( пусто )', ['class' => 'badge']);
                $data = $data['id_collection'] !== '' ? $album : $null;
                return $data;
            }
        ],
        [
            'attribute' => 'datetime',
            'contentOptions' => function (){
                return ['class' => 'text-center align-middle'];
            },
            'headerOptions' => ['width' => '145px'],
            'content' => function($data) {
                $datetime = Yii::$app->formatter->asDatetime(strtotime($data['datetime']), 'php:d F Y');
                return Html::tag('small', $datetime, ['class' => 'text-secondary']);
            }
        ],
        [
            'attribute' => 'duration_ms',
            'label' => 'Длительность',
            'contentOptions' => function (){
                return ['class' => 'text-center align-middle'];
            },
            'content' => function($data) {
                return Time::duration($data['duration_ms']);
            }
        ],
        [
            'attribute' => 'href',
            'headerOptions' => ['width' => '130px'],
            'contentOptions' => function (){
                return ['class' => 'text-center align-middle'];
            },
            'content' => function($data) {
                return Html::a(
                    Icons::ContentCopy(20, 'text-purple'), 
                    $data['href'],
                    [
                        'class' => 'btn btn-sm copy-link',
                        'data-toggle' => 'tooltip', 
                        'data-placement' => 'top',
                        'title' => 'Copy link'
                    ]
                );
            }
        ]
    ]
]);?>

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
            'disabledListItemSubTagOptions' => ['tag' => 'div', 'class' => 'page-link', 'aria-label' => 'Next'],
            'firstPageLabel' => 'Начало',
            'lastPageLabel' => 'Конец'
        ],  
    ]);?>
</div>