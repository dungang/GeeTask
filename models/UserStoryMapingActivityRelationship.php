<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_user_story_maping_activity_relationship".
 *
 * @property int $project_id 项目
 * @property string $data 数据
 */
class UserStoryMapingActivityRelationship extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_user_story_maping_activity_relationship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'data'], 'required'],
            [['project_id'], 'integer'],
            [['data'], 'string'],
            [['project_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => '项目',
            'data' => '数据',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserStoryMapingActivityRelationshipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserStoryMapingActivityRelationshipQuery(get_called_class());
    }
}
