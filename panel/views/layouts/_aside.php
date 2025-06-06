<?php
    use frontend\components\data\Menu;
    use frontend\components\menu\AsideMenu;
    $menu = Menu::Links();
?>
<aside class="main-sidebar elevation-1 sidebar-light-purple">
    <a href="/panel/dashboard" class="brand-link bg-indigo bg-white">
        <img 
            src="/data/image/logo/logo.png" 
            alt="Vii Logo" 
            class="brand-image img-circle"
        />
        <span class="brand-text font-weight-bold">
            Vii <span class="text-purple">FM</span> 
        </span>
    </a>
    <div class="sidebar os-host os-host-resize-disabled os-host-transition os-host-overflow os-host-overflow-y os-theme-dark os-host-scrollbar-horizontal-hidden">
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <?=AsideMenu::Widget(['nav' => $menu]);?>
                </div>
            </div>
        </div>
    </div>
</aside>