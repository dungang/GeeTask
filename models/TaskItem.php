<?php

namespace app\models;

/**
 * This is the model class for table "task_item".
 *
 * @property int $id
 * @property int $user_id 开发者 
 * @property int $plan_id 计划
 * @property string $status_code 状态
 * @property int $code 编号
 * @property string $name 名称
 * @property string $description 描述
 * @property string $last_user_id 更新者
 * @property string $target_date 目标日期
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class TaskItem extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'plan_id', 'status_code'], 'required'],
            [['user_id','last_user_id', 'plan_id', 'code', 'created_at', 'updated_at'], 'integer'],
            [['target_date'], 'safe'],
            [['status_code'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '指派给', 
            'plan_id' => '计划',
            'status_code' => '状态',
            'code' => '编号',
            'name' => '名称',
            'description' => '描述',
            'last_user_id' => '更新者', 
            'target_date' => '目标日期',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskItemQuery(get_called_class());
    }
    
}
