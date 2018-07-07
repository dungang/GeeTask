<?php
namespace app\assets;

use yii\web\AssetBundle;

class SimpleUploaderAsset extends AssetBundle
{
    public $baseUrl = '@web/';
    
    public $js = [
        'js/jquery.simple-uploader.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}

