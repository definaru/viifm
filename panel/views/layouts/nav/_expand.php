
<?php
    use yii\web\View;
    use frontend\components\icons\Icons;
    $maximizeIcon = 'M240-120v-120H120v-80h200v200h-80Zm400 0v-200h200v80H720v120h-80ZM120-640v-80h120v-120h80v200H120Zm520 0v-200h80v120h120v80H640Z';
    $minimizeIcon = 'M120-120v-200h80v120h120v80H120Zm520 0v-80h120v-120h80v200H640ZM120-640v-200h200v80H200v120h-80Zm640 0v-120H640v-80h200v200h-80Z';
    
    $script = "
    fullscreen.onclick = function(){
        let path = document.getElementById('fill');
        let newPath = path.getAttribute('d') === '$maximizeIcon' ? '$minimizeIcon' : '$maximizeIcon';
        path.setAttribute('d', newPath);
    }
    ";
    $this->registerJs($script, View::POS_END);
?>
<li class="nav-item">
    <a class="nav-link" id="fullscreen" data-widget="fullscreen" href="javascript:void(0);" role="button">
        <?=Icons::Fullscreen(21);?>
    </a>
</li>