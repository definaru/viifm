<?php
    use yii\bootstrap5\Html;
    use yii\bootstrap5\Alert;
    use frontend\components\icons\Icons;
    use frontend\panel\models\helper\PanelWord;
    use frontend\panel\models\helper\Text;

    $this->title = 'Статистика запросов';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Тарифы';
    $icon = Icons::AlertDanger(20, 'me-2');
    // Yii::$app->language;
    $error = isset($data['error']) ? explode(':', $data['error']) : '';
    $this->registerCss('
        .font-mono {
            font-family: monospace;
        }
    ');
?>
<div class="row">
    <?php if($data["status"] === 'ok') { ?>
        <?php foreach ($data['response'] as $item) { 
            $diff = explode('/', $item['spentRequests']);
            $pr = PanelWord::getDiff($diff[0], $diff[1]);
        ?>
            <div class="col-md-3">
                <div class="info-box bg-white">
                    <?=Html::tag(
                        'span', 
                        Icons::Monitoring(60, 'text-muted'), 
                        ['class' => 'info-box-icon']
                    );?>
                    <div class="info-box-content">
                        <?=Html::tag(
                            'span', 
                            Text::getColorOfTariff($item['title']), 
                            ['class' => 'd-flex align-items-center font-weight-bold info-box-text']
                        );?>
                        <?=Html::tag(
                            'span', 
                            Html::tag('span', $diff[0], ['class' => 'badge badge-light mr-2']).'/'.
                            Html::tag('span', $diff[1], ['class' => 'mx-2 badge badge-secondary']).
                            Html::tag('small', 'количество запросов')
                        );?>
                        <div class="progress">
                            <?=Html::tag('div', '', [
                                'class' => 'progress-bar bg-purple', 
                                'style'=> 'width: '.$pr.'%'
                            ]);?>
                        </div>
                        <?=Html::tag(
                            'small', 
                            'Срок до: '.Yii::$app->formatter->asDatetime($item['expiredAt'], 'php:d F, Y'), 
                            ['class' => 'progress-description text-muted', 'style' => 'font-size: 12px']
                        );?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="col-12">
            <?=Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => $icon.Html::tag('strong', $error[0].':').'&#160; '.$error[3],
                'closeButton' => [
                    'class' => ['widget' => 'close'],
                    'data' => ['bs-dismiss' => 'alert'],
                    'aria' => ['label' => 'Close'],
                    'label' => Html::tag('span', '&times;', ['aria-hidden' => 'true'])
                ]
            ]);?>            
        </div>
    <?php } ?>    
    <div class="col-12">
        <pre><?php //var_dump($data);?></pre>
    </div>
</div>