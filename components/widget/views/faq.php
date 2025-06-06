<?php

/* @var $this yii\web\View */
/* @var $faqs \common\models\Faq[] */

use yii\helpers\Html;
use yii\helpers\Markdown;

?>
<div id="faqAccordion" class="accordion d-grid gap-4">
    <?php foreach ($faqs as $faq): ?>
        <div class="accordion-item border-0 rounded">
            <h2 class="accordion-header fw-bold rounded-top" id="heading-<?=$faq->id;?>">
                <button 
                    class="accordion-button collapsed" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapse-<?=$faq->id;?>" 
                    aria-expanded="false" 
                    aria-controls="collapse-<?=$faq->id;?>"
                >
                    <?= Html::encode($faq->title);?>
                </button>
            </h2>
            <div 
                id="collapse-<?=$faq->id;?>" 
                class="accordion-collapse collapse" 
                aria-labelledby="heading-<?=$faq->id;?>" 
                data-bs-parent="#faqAccordion"
            >
                <div class="accordion-body rounded-bottom border border-top-0">
                    <?= Markdown::process($faq->body, 'gfm') ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>