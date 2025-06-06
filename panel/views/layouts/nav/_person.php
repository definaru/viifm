<?php
    use yii\helpers\Html;
    use frontend\components\icons\Icons;
    use frontend\panel\models\helper\PanelWord;
    use common\models\User;
    list(
        $id, $account, $firstname, $lastname, $about, 
        $position, $phone, $adress, $telegram, $skype, 
        $useragent, $created_at, $avatar
    ) = User::getUserProfile();
    $photo = isset($avatar) ? '/admin'.$avatar : PanelWord::getGravatarImage();
    $name = isset($firstname) ? $firstname.' '.$lastname : Yii::$app->user->identity->username;
?>
<li class="nav-item dropdown">
    <a class="px-2 nav-link" data-toggle="dropdown" href="javascript:void(0);" role="button">
        <?=Icons::Person(25);?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0">
        <div class="dropdown-item user-block border-bottom">
            <?=Html::img($photo, ['class' => 'img-circle', 'alt' => $name]);?>
            <?=Html::tag('span', $name, ['class' => 'username']);?>
            <?=Html::tag('span', Yii::$app->user->identity->email, ['class' => 'description']);?>
        </div>
        <div class="dropdown-divider"></div>
        <a href="/panel/profile" class="dropdown-item">
            <?=Icons::Person(24, 'text-muted pr-2');?> Профиль
        </a>
        <a href="#" class="dropdown-item">
            <?=Icons::Settings(24, 'text-muted pr-2');?> Настройки
        </a>
        <div class="dropdown-divider"></div>
        <a href="/site/logout" class="dropdown-item" data-method="post">
            <?=Icons::Logout(24, 'text-muted pr-2');?> Выйти
        </a>
    </div>
</li>