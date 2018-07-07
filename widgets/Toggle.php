<?php
namespace app\widgets;

use yii\base\Widget;

class Toggle extends Widget
{

    public $texts = [
        'Show',
        'Hide'
    ];

    public $text = 0;

    /**
     * 触发的对象
     *
     * @var string
     */
    public $selector = '';

    /**
     * 被触发的对象
     *
     * @var string
     */
    public $targetSelector = '';

    /**
     * 触发的对象的css class
     *
     * @var string
     */
    public $cssClass = 'btn-primary';

    /**
     * 触发的对象的target css class
     *
     * @var string
     */
    public $targetCssClass = 'note-hide';

    public function run()
    {
        $text = $this->texts[$this->text];
        $text1 = $this->texts[1];
        $text0 = $this->texts[0];
        $this->view->registerJs("
    $('#$this->selector').data('text','$this->text').text('$text').click(function(e){
        e.preventDefault();
        var _this = $(this);
        _this.toggleClass('$this->cssClass');
        $('$this->targetSelector').toggleClass('$this->targetCssClass');
        var text = _this.data('text');
        if (text == 0 ) {
            _this.data('text','1');
            _this.text('$text1');
        } else {
            _this.data('text','0');
            _this.text('$text0');
        }
        
    });
");
    }
}

