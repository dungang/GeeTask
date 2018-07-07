<?php
namespace app\assets;

use yii\web\AssetBundle;

class FancyBoxAsset extends AssetBundle
{
    public $baseUrl = '@web/fancybox';
    
    public $js = [
        'jquery.fancybox.min.js',
    ];
    
    public $css = [
        'jquery.fancybox.min.css',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}

