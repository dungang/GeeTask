<?php

namespace app\models;


/**
 * This is the model class for table "task_status".
 *
 * @property string $code 编码
 * @property string $name 名称
 * @property string $status_type 名称
 * @property string $description 状态描述
 * @property int $sort 排序
 */
class TaskStatus extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_status';
    }
    
    public function init() {
        $this->status_type = 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['sort'], 'integer'],
            [['status_type'], 'string'],
            [['code', 'name'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255], 
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => '编码',
            'name' => '名称',
            'status_type' => '状态类型',
            'description' => '描述',
            'sort' => '排序',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskStatusQuery(get_called_class());
    }
    
    public static function allIdToName($key='code',$val='name',$where=['status_type'=>'task']){
        return parent::allIdToName($key, $val, $where, 'sort');
    }
}
