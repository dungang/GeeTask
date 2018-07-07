<?php
namespace app\assets;

use yii\web\AssetBundle;

class DragulaAsset extends AssetBundle
{
    public $baseUrl = '@web/dragula';
    
    public $js = [
        'dragula.min.js',
    ];
    
    public $css = [
        'dragula.min.css',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}

