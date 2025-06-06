<?php
    use yii\bootstrap5\Html;
    use frontend\components\icons\Icons;
    use frontend\panel\models\helper\Text;
    use yii\helpers\ArrayHelper;

    $this->title = 'Расширенный поиск';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Поиск каналов';

    $f = new NumberFormatter("ru", NumberFormatter::SPELLOUT);
    $request = Yii::$app->request->get('q');
    $results = $search["status"] === 'ok' ? 
        'найдено '.Text::declension($search["response"]["count"], 'канал', 'канала', 'каналов') : 
        'Нет результатов';
    $result = explode(' ', $results);

    $cat = isset($categories["response"]) ? ArrayHelper::map($categories["response"], 'code', 'name') : [];
    $lang = isset($languages["response"]) ? ArrayHelper::map($languages["response"], 'code', 'name') : [];
    $count = isset($countries["response"]) ? ArrayHelper::map($countries["response"], 'code', 'name') : []; 
?>
<h2 class="text-center display-4 py-3">Расширенный поиск</h2>
<?=Html::beginForm('/panel/search', 'get', []) ?>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <?=Html::dropDownList(
                        'countries', 
                        Yii::$app->request->get('countries'), 
                        $count, 
                        [
                            'class' => 'form-control',
                            'prompt' => 'Выберите страну...'
                        ]
                    );?>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <?=Html::dropDownList(
                        'categories', 
                        Yii::$app->request->get('categories'), 
                        $cat, 
                        [
                            'class' => 'form-control',
                            'prompt' => 'Выберите категорию...'
                        ]
                    );?>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <?=Html::dropDownList(
                        'languages', 
                        Yii::$app->request->get('languages'), 
                        $lang, 
                        [
                            'class' => 'form-control',
                            'prompt' => 'Выберите язык...'
                        ]
                    );?>
                </div>
            </div>            
        </div>
        <div class="form-group">
            <div class="input-group input-group-lg">
                <?=Html::input('search', 'q', $request, [
                    'class' => 'form-control form-control-lg',
                    'placeholder' => 'Название канала или @username...'
                ]);?>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <?=Icons::Search(20);?>
                    </button>
                </div>
            </div>
        </div>
        <p class="text-secondary">
            <?=Html::tag(
                'span', 
                'Результаты поиска <b>"'.$request.'"</b>'
            );?>, <?=$result[0];?> <?=$f->format($result[1]);?> <?=$result[2];?> (<?=$result[1];?>)
        </p>
    </div>
</div>
<?=Html::endForm();?>
<div class="row">
    <div class="col-md-10 offset-md-1 mp-5 pb-5">
        <div class="row">
            <?php 
                foreach($search["response"]["items"] as $item) { 
                $color = $item["participants_count"] < 10000 ? 'badge-danger' : 'bg-teal';
            ?>
                <div class="col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple" style="height: 70px">
                            <?=Html::img($item["image100"], [
                                'class' => 'w-100 h-100 rounded mb-2',
                                'alt' => $item["title"],
                                'data-image' => $item["image640"]
                            ]);?>
                        </span>
                        <div class="info-box-content" style="line-height: inherit">
                            <a href="https://<?=$item["link"];?>" target="_blank" rel="noopener noreferrer" data-href="<?=$item["link"];?>">
                                <?=Html::tag('span', $item["title"], ['class' => 'info-box-number m-0'])?>
                            </a>
                            <span class="info-box-text text-muted">
                                <span class="badge <?=$color;?> text-white">
                                    <?=number_format($item["participants_count"], 0, '', ' ');?>
                                </span>
                                <span class="badge" title="Индекс цитирования">
                                    ИЦ <?=round($item["ci_index"], 2);?>
                                </span>
                                &#160;/&#160;
                                <small><?=Yii::$app->formatter->format($item["created_at"], 'date');?></small>
                            </span>  
                            <p class="m-0">
                                <small class="pl-0 text-truncate col-8 d-block">
                                    <?=$item["about"] !== '' ? $item["about"] : 'Нет описания';?>
                                </small>
                            </p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#channel">
                                Подробнее
                            </button>                            
                        </div>
                    </div>
                </div>
            <?php } ?>
            <pre><?php //var_dump($search);?></pre>
 
            <!-- <div class="col-12">
                <p class="text-muted">Результат...</p>
            </div> -->
        </div>
    </div>
</div>


<!-- modal-sm -->
<div class="modal fade" id="channel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="error-message"></div>
                <img src="" class="w-100 rounded mb-2" alt="" />
                <p><span class="badge bg-teal"></span> подписчиков</p>
                <hr />
                <p class="w-75 text-break pre-line" style="white-space: pre-line"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Members(id) {
        const res = await fetch(`/panel/admin/members?id=${id}`);
        const members = await res.json();
        return members?.result;
        //alert('Vii: число подписчиков в Telegram: ' . members?.result);
    }
    document.querySelectorAll('.info-box').forEach(function(infoBox) {
        infoBox.addEventListener('click', async function(event) {
            const image = infoBox.querySelector('.info-box-icon img').dataset.image;
            const link = infoBox.querySelector('.info-box-content a').dataset.href;
            const title = infoBox.querySelector('.info-box-number').textContent;
            const badges = Array.from(infoBox.querySelectorAll('.badge')).map(badge => badge.textContent.trim());
            const description = infoBox.querySelector('.text-truncate').textContent.trim();
            let href = link.split('/')[1];

            const data = {
                image,
                title: title,
                link: href,
                badges: badges[0].replaceAll(' ', ''),
                description: description
            };

            document.querySelector('#channel .modal-title').textContent = data.title;
            document.querySelector('#channel .modal-body img').src = data.image;
            document.querySelector('#channel .modal-body img').alt = data.title;
            document.querySelector('#channel .modal-body .badge').textContent = data.badges;
            document.querySelector('#channel .modal-body p:last-of-type').textContent = data.description; 
            const membersCount = await Members(data.link);
            if (Number(membersCount) && Number(data.badges) !== Number(membersCount)) {
                document.querySelector('.error-message').classList.add('alert', 'alert-danger');
                document.querySelector('.error-message').textContent = 'Vii: число подписчиков в Telegram: '+membersCount;
            } else {
                document.querySelector('.error-message').classList.remove('alert', 'alert-danger');
                document.querySelector('.error-message').textContent = '';
            }

        });
    });
</script>