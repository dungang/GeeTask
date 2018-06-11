<?php

namespace app\models;

/**
 * This is the model class for table "task_content".
 *
 * @property int $id
 * @property int $item_id 任务项
 * @property int $user_id 被指派
 * @property int $creator_id 编辑者
 * @property string $status_code 状态
 * @property string $content 内容
 * @property int $created_at 添加时间
 */
class TaskContent extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'user_id', 'creator_id', 'status_code','content'], 'required'],
            [['item_id', 'user_id', 'creator_id', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['status_code'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => '任务项',
            'user_id' => '被指派',
            'creator_id' => '编辑者',
            'status_code' => '状态',
            'content' => '内容',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskContentQuery(get_called_class());
    }
    
    public static function findNewestOneByItemId($item_id) {
        return TaskContent::find()->where(['item_id'=>$item_id])->orderBy('created_at desc')->one();
    }
}
