<?php
    $this->title = 'Create Channel';
    $this->params['breadcrumbs'][] = ['label' => 'Список каналов', 'url' => '/panel/purchase/channels'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Create Channel';
?>
<div class="channel-create">
    <?=$this->render('_form', [
        'model' => $model, 
        'username' => $username
     ]);?>
</div>