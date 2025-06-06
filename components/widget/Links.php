<?php
namespace frontend\components\widget;

use Yii;
use yii\web\View;
use yii\base\Widget;
use frontend\components\toastr\Toastr;
use frontend\components\data\Links as Data;


class Links extends Widget
{

    public function init()
    {
        $this->registerClientScript();
        parent::init();
    }

    public function run()
    {
        $cache = Yii::$app->cache;
        $cacheKey = 'widget_links';
        $html = $cache->get($cacheKey);
        //$cache->delete($cacheKey);
        if ($html === false) {
            $html = $this->generateHtml();
            $cache->set($cacheKey, $html, 86400);
        }
        return $html;
    }

    private function generateHtml()
    {
        $data = Data::List();
        return $this->render('links', ['data' => $data]);
    }

    public function registerClientScript()
    {
        Toastr::Widget();
        $js = <<<JS
        document.addEventListener('DOMContentLoaded', (event) => {
            const links = document.querySelectorAll('.copy-link');
            const toast = document.getElementById('liveToast');
            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const url = link.href;
                    const tempInput = document.createElement('input');
                    tempInput.value = url;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    toastr.success(
                        'Ссылка скопирована в буфер обмена!', '', 
                        {
                            positionClass: 'toast-bottom-right',
                            timeOut: 5000
                        }
                    );
                });
            });
        });
        JS;
        $this->view->registerCss('
            .truncate-text {
                width: 300px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: block;
            }
        ');
        $this->view->registerJs($js, View::POS_END); 
    }

}