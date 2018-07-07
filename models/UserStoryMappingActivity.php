<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_user_story_mapping_activity".
 *
 * @property int $id
 * @property int $pid 活动
 * @property int $project_id 项目
 * @property int $virtual_user_id 虚拟用户
 * @property string $title 标题
 * @property string $type 类型
 * @property string $business_value 商业价值
 */
class UserStoryMappingActivity extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_user_story_mapping_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'virtual_user_id'], 'required'],
            [['project_id', 'pid', 'virtual_user_id'], 'integer'],
            [['type'], 'string'],
            [['title'], 'string', 'max' => 128],
            [['business_value'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '活动',
            'project_id' => '项目',
            'virtual_user_id' => '虚拟用户',
            'title' => '标题',
            'type' => '类型',
            'business_value' => '商业价值',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserStoryMappingActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserStoryMappingActivityQuery(get_called_class());
    }
}
