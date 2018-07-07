<?php
namespace app\assets;

use kartik\base\AssetBundle;

class JqueryContextMenuAsset extends AssetBundle
{
    public $baseUrl = '@web/contextmenu';
    
    public $js = [
        'jquery.contextMenu.min.js',
    ];
    
    public $css = [
        'jquery.contextMenu.min.css',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}

