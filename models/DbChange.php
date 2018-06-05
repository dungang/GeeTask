<?php

namespace app\models;

/**
 * This is the model class for table "db_change".
 *
 * @property int $id
 * @property int $db_id 数据库
 * @property int $task_item_id 任务项
 * @property int $task_plan_id 计划
 * @property int $creator_id 创建人
 * @property int $user_id 用户
 * @property string $content 内容
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class DbChange extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_change';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['db_id', 'task_item_id', 'task_plan_id', 'creator_id'], 'required'],
            [['db_id', 'task_item_id', 'task_plan_id', 'creator_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'db_id' => '数据库',
            'task_item_id' => '任务项',
            'task_plan_id' => '计划',
            'creator_id' => '创建人',
            'user_id' => '用户',
            'content' => '内容',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DbChangeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DbChangeQuery(get_called_class());
    }
}
