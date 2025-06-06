<?php
    use frontend\components\icons\Icons;
?>
<?php if(Yii::$app->controller->action->id !== 'error') : ?>
    <div class="col-md-12 text-center py-5">
        <a 
            target="_blank" 
            class="btn btn-light gap-2 d-inline-flex align-items-center px-4"
            href="//yandex.ru/maps/org/237084092601/reviews?utm_source=badge&utm_medium=rating&utm_campaign=v1" 
            rel="noopener noreferrer"
        >
            <?=Icons::Pencil(16);?>
            <?=Yii::t('vii', 'Leave a review');?>
        </a>
    </div>
<?php endif; ?>