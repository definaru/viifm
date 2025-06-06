<?php
    use yii\helpers\Url;
    use yii\bootstrap5\Html;
    use yii\helpers\Markdown;

    $this->title = Yii::t('vii', 'Channel Rules');
    $this->params['breadcrumbs'][] = $this->title;
    
    $url = Url::canonical();
    $description = Yii::t('vii', 'List of rules');
    $filePath = Yii::getAlias('@frontend/web/data/content/RULES.md');
    $file = file_get_contents($filePath);

    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'правила, канал, music, vii, enigma, achiella']);
    $this->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    
    $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
    $this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
    $this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
    $this->registerMetaTag(['property' => 'og:description', 'content' => $description]);    
    $this->registerCss('
        .rules {
            ol {
                display: grid;
                gap: 2em;
            }
            em {
                font-weight: normal;
                opacity: .9;
                color: var(--bs-tertiary-color);
            }
            a {
                color: var(--bs-highlight-color);
                &:hover {
                    color: var(--bs-tertiary-color);
                }
            }        
        }
    ');
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-5 pb-5">
        <?=Html::tag('h2', $this->title, ['class' => 'display-5 text-center mb-5']);?>
        <div class="rules">
            <?=Markdown::process($file, 'gfm');?>
        </div>
    </div>
</div>