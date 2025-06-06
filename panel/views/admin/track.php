<?php
    use yii\web\View;
    use yii\bootstrap5\Html;
    use frontend\components\card\FnCard;
    use frontend\components\helpers\datetime\Time;
    use frontend\components\toastr\Toastr;
    use frontend\components\icons\Icons;
    use frontend\panel\models\Music;
    
    Toastr::Widget();
    
    list(
        $album, 
        $artists, 
        $available_markets, 
        $disc_number, 
        $duration_ms, 
        $explicit, 
        $external_ids, 
        $external_urls,
        $href, 
        $id, 
        $is_local, 
        $name, 
        $popularity, 
        $preview_url, 
        $track_number
    ) = array_values($model);

    $year = $model['status'] === 'error' ? 'Нет данных' : explode('-', $album['release_date'])[0];
    $artist = $model['status'] === 'error' ? 'Нет данных' : $album["artists"][0]["name"];
    $title = $model['status'] === 'error' ? 'Нет данных' : $artist .' - '. $name;    

    $this->title = 'Данные трека';
    $this->params['breadcrumbs'][] = ['label' => 'Плэйлист', 'url' => '/panel/playlist/music'];
    $this->params['breadcrumbs'][] = $title;
    $this->blocks['header'] = $this->title;



    $js = <<<JS
    document.addEventListener('DOMContentLoaded', (event) => {
        let links = document.querySelector('.copy-link');
        let сopy = document.querySelector('#select');
        let text = сopy.value.trim();
        let range = document.createRange();
        links.addEventListener('click', (e) => {
            range.selectNode(сopy);
            сopy.select();
            document.execCommand('copy'); 
            toastr.success(
                'Ссылка скопирована в буфер обмена!', '', 
                {
                    positionClass: 'toast-bottom-right',
                    timeOut: 5000
                }
            );
        });
    });
    JS;
    $this->registerJs($js, View::POS_END);
    $this->registerCss('
        input#select::selection {
            background-color: #20c997;
            color: #fff;
        }
    ');
?>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => $title,
            'close' => false
        ]); ?>
        <div class="row">
            <?php if($model['status'] === 'error') { ?>
                <div class="col-12">
                    <div class="alert alert-danger m-0" role="alert">
                        <strong><?=ucfirst($model['status']);?>:</strong> &#160;
                        <?=json_decode(explode('response:', $model['error'])[1], true)["error"]["message"];?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-12 col-md-5">
                    <?=Html::img($album['images'][0]['url'], [
                        'class' => 'w-100 rounded border shadow bg-dark',
                        'style' => 'aspect-ratio: 1 / 1',
                        'alt' => $title
                    ]);?> 
                </div>
                <div class="col-12 col-md-7">
                    <div class="pl-4">
                        <p>
                            Album: <br />
                            <strong class="text-teal"><?=$album['name'];?></strong>
                        </p>  
                        <?=Html::tag(
                            'h1', 
                            Html::a(
                                Music::getArtist($artists),
                                $album['external_urls']['spotify'],
                                ['target' => '_blank']
                            ), 
                            ['class' => 'text-purple mt-5']
                        );?>            
                        <?=Html::tag('h3', $name, ['class' => 'info-box-text mb-5']);?>
                        <p class="text-muted">
                            Длительность: <?=Time::duration($duration_ms);?>
                        </p>                 
                        <p>
                            <div class="col-8 p-0">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div 
                                            role="button"
                                            class="input-group-text bg-white copy-link" 
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Copy link"
                                        >
                                            <?=Icons::ContentCopy(20, 'text-purple');?>
                                        </div>
                                    </div>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Ссылка на трек..."
                                        value="<?=$album['external_urls']['spotify'];?>"
                                        id="select"
                                    />
                                </div>
                            </div>
                        </p>
                        
                        <p class="mt-5">Год выпуска: <strong><?=$year;?></strong></p>                  
                        <p>Номер трека: <strong><?=$track_number;?> / <?=$album['total_tracks'];?></strong></p>
                    </div>                
                    
                    
                </div>
            <?php } ?>
        </div>
        <?php FnCard::end(); ?>
    </div>
</div>