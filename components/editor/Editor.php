<?php

namespace frontend\components\editor;

use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\assets\EditorAsset;

/*
 @ Documentation: https://summernote.org
*/
class Editor extends Widget
{
    /*
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    */
    public $clientOptions = [];

    public function init()
    {
        $this->registerClientScript();
        parent::init();
    }

    public function run()
    {
        return $this->render('tinymce');
    }

    public function registerClientScript()
    {
        $this->clientOptions = ArrayHelper::merge(
            $this->clientOptions, []
        );

        EditorAsset::register($this->view);
        $clientOptions = Json::encode($this->clientOptions);
        $this->view->registerJs("$('#summernote').summernote($clientOptions);");
        $this->view->registerCss('
            .note-editor.note-airframe, .note-editor.note-frame {
                border: 1px solid #fff;
                box-shadow: none;
                margin-bottom: 0;
            }
            .note-toolbar {
                background: #ffffff;
            }
            .note-editor.note-airframe .note-statusbar, .note-editor.note-frame .note-statusbar {
                background-color: #ffffff;
                border-top: 1px solid #f1f0f0;
            }
            .note-btn-group .note-btn {
                border-color: #f1f0f0;
            }
            .btn-light {
                background-color: #ffffff;
            }
        ');
    }

}