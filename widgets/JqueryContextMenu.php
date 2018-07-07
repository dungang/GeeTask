<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Json;
use app\assets\JqueryContextMenuAsset;

class JqueryContextMenu extends Widget
{

    /**
     * options for plugin script
     *
     * @var array
     */
    public $options;

    /**
     * Specifies the default callback to be used in case an item does not expose its own callback.
     * The default callback behaves just like item.callback.
     *
     * @var callable
     */
    public $callback;

    /**
     * The jQuery selector matching the elements to trigger on.
     * This option is mandatory.
     *
     * @var string
     */
    public $selector;

    /**
     * Object with items to be listed in contextMenu.
     * See items for a full documentation on how to build your menu items.
     * http://swisnl.github.io/jQuery-contextMenu/docs/items.html
     * [name, callback,className,icon,disabled,visible,type,events,value,selected,radio,options,height,items,accesskey]
     * <code>
     * 'items'=>[
     * 'delete'=>['name'=>'删除','icon'=>'delete'],
     * 'story'=>['name'=>'转为故事(Story)','icon'=>'copy'],
     * 'feature'=>['name'=>'转为功能(Feature)','icon'=>'copy'],
     * ]
     * </code>
     * @var array
     */
    public $items;

    /**
     * Specifies the offset to add to the calculated zIndex of the trigger element.
     * Set to 0 to prevent zIndex manipulation.
     * Can be a function that returns an int to calculate the zIndex on build
     *
     * @var integer
     */
    public $zIndex = 10;

    public function run()
    {
        JqueryContextMenuAsset::register($this->view);
        if ($this->selector)
            $this->options['selector'] = $this->selector;
        if ($this->zIndex)
            $this->options['zIndex'] = $this->zIndex;
        if ($this->callback)
            $this->options['callback'] = $this->callback;
        if ($this->items)
            $this->options['items'] = $this->items;
        $js = '$.contextMenu(' . Json::htmlEncode($this->options) . ')';
        $this->view->registerJs($js);
    }
}

