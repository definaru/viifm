<?php
    use yii\helpers\Html;
    use backend\assets\BackendAsset;
    use common\widgets\Alert;
    BackendAsset::register($this);
    $auth = isset($this->blocks['auth']) ? $this->blocks['auth'] : '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <?= Html::csrfMetaTags() ?>
        <title><?=Html::encode($this->title);?></title>
        <?php $this->head() ?>
    </head>
    <body class="login-page">
        <?php $this->beginBody() ?>
        <div class="login-box">
            <div class="login-logo">
                <a href="/"><b class="text-purple">Vii</b> FM</a>
            </div>
            <main class="card">
                <?=Alert::widget();?>
                <?=$content;?>
                <div class="card-footer text-center bg-white">
                    <footer>
                        <small class="text-secondary">
                            &copy; Vii FM &middot; <?=date('Y');?>, <?=Yii::t('vii', 'All rights reserved');?>
                        </small>
                    </footer>
                </div>
            </main>
        </div>
        <?=$auth;?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>