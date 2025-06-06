
<?php
    use yii\helpers\Html;
    use frontend\components\icons\Icons;
?>
<nav class="main-header navbar navbar-expand bg-dark navbar-light bg-white">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <?=Icons::Menu(20);?>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?=Html::a('Home', '/', ['class' => 'nav-link']);?>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="javascript:void(0);" role="button">
                <?=Icons::Search(25);?>
            </a>
            <div class="navbar-search-block" style="display: none;">
                <?=Html::beginForm('/panel/search', 'get', ['class' => 'form-inline']) ?>
                    <div class="input-group input-group-sm">
                        <?=Html::textInput('q', Yii::$app->request->get('q'), [
                            'type' => 'search',
                            'class' => 'form-control form-control-navbar pl-3', 
                            'placeholder' => 'Поиск каналов...',
                            'aria-label' => 'Search'
                        ]);?>
                        <!-- <input class="form-control form-control-navbar pl-3" type="search" placeholder="Поиск каналов" aria-label="Search"> -->
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <?=Icons::Search(18);?>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <?=Icons::Close(18);?>
                            </button>
                        </div>
                    </div>
                <?=Html::endForm();?>
            </div>
        </li>
        <?=$this->render('nav/_channel');?>
        <?=$this->render('nav/_notifications');?>
        <?=$this->render('nav/_expand');?>
        <?=$this->render('nav/_person');?>
    </ul>
</nav>