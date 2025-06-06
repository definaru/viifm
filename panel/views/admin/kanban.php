<?php
    use yii\bootstrap5\Html;
    use frontend\components\data\Links;
    //use frontend\components\icons\Icons;
    
    $this->title = 'Kanban Board';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
    $data = Links::List()
?>
<div class="row">
    <div class="col-12">
        <?=Html::tag('h4', 'Скоро будет...');?>
    </div>
</div>