<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_alter".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property int $user_story_id 用户故事
 * @property int $alter_type_id 变更类型
 * @property string $content 内容
 * @property int $creator_id 创建者
 * @property int $updator_id 更新者
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $is_del
 */
class Alter extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_alter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'user_story_id', 'alter_type_id', 'content', 'creator_id', 'updator_id', 'created_at', 'updated_at'], 'required'],
            [['project_id', 'user_story_id', 'alter_type_id', 'creator_id', 'updator_id', 'created_at', 'updated_at', 'is_del'], 'integer'],
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
            'project_id' => '项目',
            'user_story_id' => '用户故事',
            'alter_type_id' => '变更类型',
            'content' => '内容',
            'creator_id' => '创建者',
            'updator_id' => '更新者',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AlterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlterQuery(get_called_class());
    }
}
