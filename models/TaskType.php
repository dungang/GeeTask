<?php

namespace app\models;

/**
 * This is the model class for table "task_type".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $type_code 编码
 * @property string $intro 介绍
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class TaskType extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_code', 'intro'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'type_code'], 'string', 'max' => 32],
            [['intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'type_code' => '编码',
            'intro' => '介绍',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskTypeQuery(get_called_class());
    }
}
