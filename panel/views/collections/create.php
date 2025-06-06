<?php
    $this->title = 'Новый сборник';
    $this->params['breadcrumbs'][] = ['label' => 'Сборники', 'url' => '/panel/playlist/collections'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
?>
<div class="row">
    <div class="col-12">
        <?=$this->render('_form', ['model' => $model]);?>
    </div>
</div>