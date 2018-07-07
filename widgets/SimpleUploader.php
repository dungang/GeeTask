<?php
namespace app\widgets;

use yii\bootstrap\InputWidget;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\SimpleUploaderAsset;

class SimpleUploader extends InputWidget
{
    public $width = "160";
    
    public $height = "160";
    
    public $fileField = 'file';
    
    public $url = ['/tools/upload-image'];
    
    public $zoneClass = '';
    
    public $checkImageSize = false;
    
    public $imageSize = [
        'height'=>100,
        'width'=>100,
    ];
    
    
    public function run()
    {
        $this->url = Url::to($this->url);
        SimpleUploaderAsset::register($this->view);
        
        $this->clientOptions['extraData'][\Yii::$app->request->csrfParam] = \Yii::$app->request->getCsrfToken();
        $this->clientOptions['fileName'] = $this->fileField;
        $this->clientOptions['url'] = $this->url;
        if ($this->hasModel()) {
            if (isset($this->model->{$this->attribute})){
                $image = $this->model->{$this->attribute};
            }else{
                //收集列表 一个表单中以单一的形式处理多个模型
                $image = $this->value;
            }
            
            $input = Html::activeHiddenInput($this->model, $this->attribute,$this->options);
        } else {
            $image = $this->value;
            $input = Html::hiddenInput($this->name, $this->value,$this->options);
        }
        
        if($this->checkImageSize) {
            $this->clientOptions['checkImageSize'] = true;
            $this->clientOptions['imageSize'] = $this->imageSize;
        }
        
        $this->clientOptions['onPreview'] = new JsExpression("
            function(imageData){
                this.find('div.simple-uploader-preview').each(function(){
                    var _this = $(this);
                    var image = $('<img height=\'100%\' width=\'100%\' />');
                    image.attr('src',imageData);
                    _this.empty().append(image);
                    _this.css({'border':'0'});
                });
            }
        ");
        
        $this->clientOptions['onUploadProgress'] = new JsExpression("
            function(percent){
                this.find('div.simple-uploader-process-bar').each(function(){
                    var _this = $(this);
                    _this.show();
                    _this.find('div.progress-bar').each(function(){
                        var span = $(this);
                        span.css({width: percent+'%'});
                    });
                });
            }
        ");
        
        $this->clientOptions['onUploadSuccess'] = new JsExpression("
            function(data){
                this.find('div.simple-uploader-process-bar').each(function(){
                    var _this = $(this);
                    _this.hide();
                    _this.find('div.progress-bar').each(function(){
                        var span = $(this);
                        span.css({width: '1%'});
                    });
                });
                if (data.result) {
                    $('#{$this->options['id']}').val(data.result);
                }
            }
        ");
        
        $this->registerPlugin('simpleUploader');
        $paddingTop = $this->height / 2 - 10;
        $processOptions = [
            'class'=>'simple-uploader-process-bar',
            'style'=>"display:none;position:absolute;top:0; padding: 0 20px; padding-top:{$paddingTop}px;left:0;height:{$this->height}px; width:{$this->width}px;",
            ];
        $processBar = Html::tag('div',
            "<div class=\"progress\">
              <div class=\"progress-bar progress-bar-info progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">
                <span class=\"sr-only\">40% Complete (success)</span>
              </div>
            </div>",
            $processOptions);
        
        
        $previewBorder = '';
        if ($image) {
            $image = "<img src='$image' height='100%' width='100%'/>";
        } else {
            $previewBorder = "border: 1px dashed rgba(0, 0, 0, 0.3);";
            $image = "<div style=\"line-height: {$this->height}px;\" class='text-primary'><i class=\"glyphicon glyphicon-cloud-upload\" style='font-size:32px;'></i> 上传图片</div>";
        }
        
        $previewOptions = [
            'style'=>"$previewBorder text-align:center;height:{$this->height}px; width:{$this->width}px;",
            'class'=>"simple-uploader-preview",
            ];
        $preview = Html::tag('div',$image,$previewOptions);
        
        $zoneOptions['style']="position:relative;height:{$this->height}px; width:{$this->width}px; cursor:pointer";
        $zoneOptions['class']='simple-uploader-zone ' . $this->zoneClass;
        $zoneOptions['id'] = 'zone-' . $this->options['id'];
        return $input . Html::tag('div', $preview . $processBar, $zoneOptions);
    }
    
}

