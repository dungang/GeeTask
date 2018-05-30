<?php

namespace app\models;


/**
 * This is the model class for table "task_done".
 *
 * @property int $id
 * @property int $user_id 处理用户
 * @property int $plan_id 计划 
 * @property int $item_id 任务项
 * @property string $status_code 变更任务状态
 * @property string $remark 备注
 * @property int $created_at 添加时间
 */
class TaskDone extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_done';
    }

    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'plan_id', 'item_id', 'status_code'], 'required'],
            [['user_id', 'plan_id', 'item_id', 'created_at'], 'integer'],
            [['remark'], 'string'],
            [['status_code'], 'string', 'max' => 32]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '处理用户',
            'plan_id' => '计划', 
            'item_id' => '任务项',
            'status_code' => '变更任务状态',
            'remark' => '备注',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskDoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskDoneQuery(get_called_class());
    }
}
