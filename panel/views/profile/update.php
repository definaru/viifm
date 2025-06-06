<?php  
    $this->title = 'Обновить профиль';
    $this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => '/panel/profile'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Профиль';
?>
<div class="row">
    <div class="col-9">
        <?=$this->render('_form', ['model' => $model]);?>
    </div>
</div>