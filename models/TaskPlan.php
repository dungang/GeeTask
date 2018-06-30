<?php

namespace app\models;

/**
 * This is the model class for table "task_plan".
 *
 * @property int $id
 * @property int $team_id 团队
 * @property string $task_type 类型
 * @property string $name 名称
 * @property string $target_version 目标版本
 * @property int $plan_status 状态
 * @property string $target_date 目标日期
 * @property string $test_date 测试发布日期
 * @property string $prod_date 生产发布日期
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class TaskPlan extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'task_type'], 'required'],
            [['team_id', 'plan_status', 'created_at', 'updated_at'], 'integer'],
            [['target_date', 'test_date', 'prod_date'], 'safe'],
            [['task_type', 'target_version'], 'string', 'max' => 32],
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
            'team_id' => '团队',
            'task_type' => '类型',
            'name' => '名称',
            'target_version' => '目标版本',
            'plan_status' => '状态',
            'target_date' => '目标日期',
            'test_date' => '测试发布日期',
            'prod_date' => '生产发布日期',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskPlanQuery(get_called_class());
    }
}
