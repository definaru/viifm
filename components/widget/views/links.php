<?php
    use yii\bootstrap5\Html;
    use frontend\components\helpers\meta\MetaTags;
    use frontend\components\icons\Icons;
    $this->registerCss('
        .truncate-text {
            width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }
    ');
?>
<?php foreach($data as $item) { 
    $meta = MetaTags::getPreview($item['url']);
?>
<div class="col-12 col-sm-6 col-md-4">
    <div class="card card-purple card-outline">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <img 
                    src="<?=$item['icon'];?>" 
                    class="mr-3 rounded"
                    alt="<?=$item['title']?>" 
                    style="width: 50px;height:50px"
                />
                <div>
                    <div class="d-flex align-items-center">
                        <?=Html::tag('h3', $item['title'], ['class' => 'profile-username']);?>
                        <?php if(isset($meta['og:description'])) { ?>
                        <abbr 
                            class="ml-2 px-2 border rounded-circle text-decoration-none" 
                            title="<?=$meta['og:description'];?>" 
                            class="initialism"
                        >
                            ?
                        </abbr>
                        <?php } ?>
                    </div>
                    <div class="d-flex align-items-center">
                        <?=Html::a(
                            Icons::ContentCopy(20, 'text-purple'), 
                            $item['url'],
                            [
                                'class' => 'pl-0 btn btn-sm copy-link',
                                'data-toggle' => 'tooltip', 
                                'data-placement' => 'top',
                                'title' => 'Copy link'
                            ]
                        );?>
                        <div>
                            <?=Html::a(
                                $item['url'], $item['url'], 
                                ['class' => 'text-muted truncate-text', 'target' => '_blank']
                            );?>
                        </div>                    
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>