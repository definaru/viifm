 <?php
    use yii\helpers\Html;
    use yii\widgets\Pjax;
    use frontend\assets\AdminAsset;
    AdminAsset::register($this);
    $header = isset($this->blocks['header']) ? $this->blocks['header'] : '';
    $subtitle = isset($this->blocks['subtitle']) ? $this->blocks['subtitle'] : '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" style="height: auto;">
    <head>
        <meta charset="UTF-8"/>
        <meta name="robots" content="noindex, nofollow" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title);?></title>
        <?php $this->head() ?>
    </head>
    <body class="layout-navbar-fixed layout-fixed accent-indigo sidebar-mini" style="height: auto;">
        <?php $this->beginBody() ?>
            <?php Pjax::begin(); ?>
                <div class="wrapper">
                    <?=$this->render('_nav');?>
                    <?=$this->render('_aside');?>
                    <div class="content-wrapper">
                        <?=$this->render('_breadcrumbs', [
                            'nav' => $this->params['breadcrumbs'],
                            'header' => $header,
                            'subtitle' => $subtitle,
                        ]);?>
                        <section class="content">
                            <div class="container-fluid">
                                <?=$content;?>
                            </div>
                        </section>
                    </div>
                    <?=$this->render('_footer');?>           
                </div>            
            <?php Pjax::end(); ?>
        <?php $this->endBody() ?>

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>        
    </body>
</html>
<?php $this->endPage() ?>