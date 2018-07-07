<?php
namespace app\assets;

use kartik\base\AssetBundle;

class BootstrapContextMenuAsset extends AssetBundle
{
    public $baseUrl = '@web/js';
    
    public $js = [
        'bootstrap.contextmenu.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}

