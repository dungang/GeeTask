<?php
namespace app\baidu\tongji\models;

use yii\base\Model;

class SiteInfo extends Model
{
    /**
     * 应用ID
     * @var number
     */
    public $site_id;
    
    /**
     * 站点域名
     * @var string
     */
    public $domain;
    
    /**
     * 0：正常；1：暂停
     * @var number
     */
    public $status;
    
    /**
     * 日期时间格式，以北京时间表示
     * @var string
     */
    public $create_time;
    
    /**
     * 子目录列表
     * @var array
     */
    public $sub_dir_list;
    
    
    /**
     * {@inheritDoc}
     * @see \yii\base\BaseObject::init()
     */
    public function init()
    {
        $this->key = 'site_id';
        
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\base\Model::rules()
     */
    public function rules()
    {
        return [
            [['domain','create_time','sub_dir_list'],'safe'],
            [['site_id','status'],'integer'],
        ];
    }
    
    
    /**
     * {@inheritDoc}
     * @see \yii\base\Model::attributeLabels()
     */
    public function attributeLabels()
    {
        return [
            'site_id'=>'应用ID',
            'domain'=>'站点域名',
            'status'=>'',
            'create_time'=>'状态',
            'sub_dir_list'=>'子目录列表',
        ];
    }



    
    
}

