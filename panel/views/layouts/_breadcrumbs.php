<?php
    use yii\helpers\Html;
    use yii\widgets\Breadcrumbs;

    $sub = isset($subtitle) ? Html::tag('span', $subtitle, ['class' => 'ml-2 text-secondary', 'style' => 'font-size: 12px']) : '';
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">  
            <div class="col-sm-6">
                <?=Html::tag('h1', $header.$sub, ['class' => 'm-0']);?>
            </div>    
            <div class="col-sm-6">        
                <?=Breadcrumbs::widget([
                    'tag' => 'ol',
                    'options' => ['class' => 'breadcrumb float-sm-right'],
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>\n",
                    'homeLink' => [
                        'label' => 'Home',
                        'url' => '/panel/dashboard',
                    ],
                    'links' => isset($nav) ? $nav : [],
                ]) ?>
            </div>   
        </div>
    </div>
</div>