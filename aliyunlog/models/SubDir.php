<?php
namespace app\baidu\tongji\models;

use yii\base\Model;

class SubDir extends Model
{
    public $sub_dir_id;
    
    public $name;
    
    public $create_time;
    
    public function init() {
        $this->key = 'sub_dir_id';
    }
    
    public function rules(){
        return [
            [['name','create_time'],'safe'],
            [['sub_dir_id'],'integer'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'sub_dir_id'=>'子目录id',
            'name'=>'子目录',
            'create_time'=>'添加日期'
        ];
    }
}

