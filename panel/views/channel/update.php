<?php
    $this->title = 'Update Channel: ' . $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Список каналов', 'url' => '/panel/purchase/channels'];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Update';
    $this->blocks['header'] = 'Update Channel';
?>
<div class="channel-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>