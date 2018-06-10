<?php

namespace app\models;

/**
 * This is the model class for table "task_item".
 *
 * @property int $id
 * @property int $pid 父节点
 * @property int $plan_id 计划
 * @property string $task_type_code 类型
 * @property string $status_code 状态
 * @property int $user_id 被指派
 * @property int $creator_id 创建者
 * @property string $name 名称
 * @property int $project_id 项目
 * @property int $project_version_id 版本
 * @property int $code 编号
 * @property string $target_date 目标日期
 * @property int $last_user_id 更新者
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
            [['name','plan_id', 'status_code', 'user_id', 'creator_id'], 'required'],
            [['pid', 'plan_id', 'user_id', 'creator_id', 'project_id', 'project_version_id', 'code', 'last_user_id', 'created_at', 'updated_at'], 'integer'],
            [['target_date'], 'safe'],
            [['task_type_code', 'status_code'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父节点',
            'plan_id' => '计划',
            'task_type_code' => '类型',
            'status_code' => '状态',
            'user_id' => '被指派',
            'creator_id' => '创建者',
            'name' => '名称',
            'project_id' => '项目',
            'project_version_id' => '版本',
            'code' => '编号',
            'target_date' => '目标日期',
            'last_user_id' => '更新者',
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
