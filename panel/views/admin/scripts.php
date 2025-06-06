<?php
    //use yii\bootstrap5\Html;
    //use frontend\panel\models\helper\PanelWord;
    
    $this->title = 'Список выпусков';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Сценарий';
    $this->registerCss('
        .circle {
            width:12px;
            height:12px;
            border-radius: 50em;
            display: block;
        }
    ');
?>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    <?php $index = 1; foreach($model as $item) { ?>
                        <li class="list-group-item border rounded p-3 mb-2">
                            <div>
                                <div class="d-flex align-items-center">
                                    <span class="align-middle mr-2 text-muted"><?=$index++;?>)</span>
                                    <span class="circle mr-2 ml-1" style="background-color: <?=$item->color;?>"></span>
                                    <span class="text-secondary">
                                        <small>
                                            <?=Yii::$app->formatter->asDatetime(
                                                $item->start, 
                                                'php:d F Y / H:i'
                                            );?>
                                        </small>
                                    </span>                                    
                                </div>
                                <div class="ml-4 pl-1">
                                    <strong><?=$item->title;?></strong><br />
                                    <pre class="pl-0 mb-0" style="font-family: sans-serif"><?=$item->description;?></pre>                                      
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>