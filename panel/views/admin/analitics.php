<?php
    use frontend\components\card\FnCard;
    use frontend\components\apexcharts\Apexcharts;

    $this->title = 'Аналитика';
    $this->params['breadcrumbs'][] = $this->title;
    $this->blocks['header'] = 'Аналитика канала Vii FM';

    $js = 'yaxis: {
        labels: {
            formatter: function(value) {
                return value + "₽"
            }
        }
    }';
?>
<div class="row">
    <div class="col-12">
        <?php FnCard::begin([
            'title' => 'График',
            'styleClass' => 'p-0'
        ]); ?>
            <?=Apexcharts::Widget([
                'id' => 'analitics',
                'script' => $js,
                'options' => [
                    'chart' => [
                        'type' => 'area',
                        'width' => '100%',
                        'height' => '300',
                        'foreColor' => 'transparent',
                        'toolbar' => false,
                        'stacked' => true,
                    ],
                    'fill' => [
                        'type' => 'gradient',
                        'gradient' => [
                            'shadeIntensity' => 1,
                            'inverseColors' => false,
                            'opacityFrom' => 0.7,
                            'opacityTo' => 0.9,
                            'stops' => [0, 90, 100]
                        ],
                    ],
                    'colors' => ['#6f42c1'],
                    'stroke' => [
                        'curve' => 'smooth',
                        'width' => 3
                    ],
                    'dataLabels' => [
                        'enabled' => false
                    ],
                    'series' => [
                        [
                            'name' => 'Продажи',
                            'data' => [30,70,35,100,35,150,49,60,70,49,60,70,91,125]
                        ]
                    ],
                    'xaxis' => [
                        'axisBorder' => [
                            'show' => false
                        ],
                        'axisTicks' => [
                            'show' => false
                        ],
                        'categories' => [1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2025],
                        'labels' => [
                            'show' => false
                        ]
                    ],
                    'grid' => [
                        'show' => false,
                        'padding' => [
                            'top' => 0,
                            'right' => 0,
                            'bottom' => -30,
                            'left' => -40
                        ]
                    ],
                    'tooltip' => [
                        'x' => [
                            'show' => false
                        ]
                    ]
                ]
            ]);?>
        <?php FnCard::end(); ?>
    </div> 
</div>