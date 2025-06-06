<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Список каналов', 'url' => '/panel/purchase/channels'];
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = $this->title;
?>
<div class="channel-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nickname',
            [
                'attribute' => 'avatar',
                'format' => 'raw',
                'value' => Html::img($model->avatar, ['style' => 'width: 200px', 'alt' => $model->title])
            ],
            'title',
            'description:ntext',
            'theme',
            'subscribers_count',
            'engagement_index',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d']
            ],
        ],
    ]) ?>

</div>