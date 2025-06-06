<?php
    use yii\bootstrap5\Html;
    use frontend\components\card\FnCard;
    use frontend\components\helpers\datetime\Time;
    use frontend\components\toastr\Toastr;
    use frontend\panel\models\helper\Text;
    use frontend\components\icons\Icons;
    use frontend\panel\models\Music;

    Toastr::Widget();

    $totalCount = $data['status'] === 'error' ? $dataProvider->totalCount : $data['total'];
    $total_music = Text::declension($totalCount, 'трек', 'трека', 'треков');
    $total = explode(' ', $total_music);
    $totals = number_format($total[0]).' '.$total[1];
    $next = explode('?', $data['next'] ?? '');
    $previous = isset($data['previous']) ? explode('?', $data['previous']) : '';

    $this->title = 'Плэйлист';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
    $this->blocks['subtitle'] = 'Всего: '.$totals;
?>

<div class="row">
    <?php /*
        <?php if (Yii::$app->session->hasFlash('exception')) { ?>
            <p class="text-danger border border-danger p-4"><?=Yii::$app->session->getFlash('exception');?></p>
        <?php } ?>    
    */ ?>
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'Список всех треков',
            'close' => false,
            'styleClass' => 'p-0'
        ]); ?>
            <?php if($data['status'] !== 'error') { ?>
                <?php if (Yii::$app->session->hasFlash('success')) { ?>
                    <p class="bg-success text-white px-3 py-2"><?=Yii::$app->session->getFlash('success');?></p>
                <?php } ?>
                <?php if (Yii::$app->session->hasFlash('error')) { ?>
                    <p class="text-danger"><?=Yii::$app->session->getFlash('error');?></p>
                <?php } ?>
                <table class="table table-hover table-sm table-borderless">
                    <thead>
                        <tr style="background: #f8f6f9">
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Альбом</th>
                            <th scope="col" style="width: 100px">Статус</th>
                            <th scope="col" style="width: 170px">Дата добавления</th>
                            <th scope="col" class="text-center" colspan="2">Длительность</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($data['status'] === 'error') { ?>
                            <tr class="border-bottom">
                                <td colspan="6" class="p-4">
                                    <div class="alert alert-danger m-0" role="alert">
                                        <strong><?=ucfirst($data['status']);?>:</strong> &#160;
                                        <?=json_decode(explode('response:', $data['error'])[1], true)["error"]["message"];?>
                                    </div>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <?php $index = 1; foreach($data['items'] as $item) { ?>
                            <tr class="border-bottom">
                                <th scope="row" class="align-middle"><?=$index++;?></th>
                                <td class="p-0">
                                    <div class="info-box m-0 shadow-none border-0 pl-0" style="background: transparent">
                                        <a 
                                            href="/panel/playlist/music/<?=$item['track']['id'];?>" 
                                            class="rounded-lg border info-box-icon bg-purple overflow-hidden"
                                            style="aspect-ratio: 1/1;flex: none;width: 70px;height: 70px"
                                        >
                                            <?=Html::img($item['track']['album']['images'][2]['url'], [
                                                'class' => 'w-100',
                                                'alt' => '...'
                                            ]);?>
                                        </a>
                                        <div class="d-flex align-items-center ml-3">
                                            <div>
                                                <span class="font-weight-bold text-purple">
                                                    <?=Music::getArtist($item['track']['artists']);?>
                                                </span> - <?=Html::tag('span', $item['track']['name']);?>                                        
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <?=Html::tag('i', $item['track']['album']['name']);?>
                                </td>
                                <td class="align-middle">
                                    <?php if ($item['track']['id_collection'] !== ''): ?>
                                        <a href="/panel/playlist/collections/view/<?=$item['track']['id_collection'];?>" target="_blank">
                                            <span class="badge badge-success">✅( есть )</span>
                                        </a>
                                    <?php else: ?>
                                        <span class="badge">❌ ( пусто )</span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle">
                                    <small class="text-secondary">
                                        <?=Yii::$app->formatter->asDatetime(
                                            strtotime($item['added_at']), 
                                            'php:d F Y, H:i'
                                        );?>                            
                                    </small>
                                </td>
                                <td class="text-center align-middle">
                                    <?=Time::duration($item['track']['duration_ms']);?>
                                </td>
                                <td class="text-center align-middle">
                                    <?=Html::a(
                                        Icons::ContentCopy(20, 'text-purple'), 
                                        $item['track']['external_urls']['spotify'],
                                        [
                                            'class' => 'btn btn-sm copy-link',
                                            'data-toggle' => 'tooltip', 
                                            'data-placement' => 'top',
                                            'title' => 'Copy link'
                                        ]
                                    );?>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            
                <div class="p-3">
                    <nav aria-label="navigation">
                        <ul class="pagination m-0">
                            <?php if($previous[1] !== '') { ?>
                            <li class="page-item">
                                <?=Html::a(
                                    '&laquo; Previous', 
                                    '/panel/playlist/music?'.$previous[1], 
                                    ['class' => 'page-link', 'data-pjax' => 0]
                                );?>
                            </li>
                            <?php } ?>
                            <li class="page-item">
                                <?=Html::a(
                                    'Next &raquo;', 
                                    '/panel/playlist/music?'.$next[1], 
                                    ['class' => 'page-link', 'data-pjax' => 0]
                                );?>
                            </li>
                        </ul>
                    </nav>            
                </div>        
            <?php }  else { ?>
                <?=$this->render('_playlistmusic', ['dataProvider' => $dataProvider]);?>
            <?php } ?>
        <?php FnCard::end(); ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const links = document.querySelectorAll('.copy-link');
        const toast = document.getElementById('liveToast');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const url = link.href;
                const tempInput = document.createElement('input');
                tempInput.value = url;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                toastr.success(
                    'Ссылка скопирована в буфер обмена!', '', 
                    {
                        positionClass: 'toast-bottom-right',
                        timeOut: 5000
                    }
                );
            });
        });
    });
</script>