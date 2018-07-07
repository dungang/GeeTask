<?php
namespace app\widgets;

use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use app\assets\FancyBoxAsset;

class Fancybox extends Widget
{

    /**
     *
     * @var string target of the widget
     */
    public $target = '[data-fancybox]';

    /**
     *
     * @var array of config settings for fancybox
     */
    public $config = [];

    /**
     *
     * @inheritdoc
     */
    public function init()
    {
        if (is_null($this->target)) {
            throw new InvalidConfigException('"FancyBox.target has not been defined.');
        }
        // publish the required assets
        $this->registerClientScript();
    }

    /**
     *
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        $config = Json::encode($this->config);
        $view->registerJs("jQuery('{$this->target}').fancybox({$config});");
    }

    /**
     * Registers required script for the plugin to work as DatePicker
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        FancyBoxAsset::register($view);
    }
}
