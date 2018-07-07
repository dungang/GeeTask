<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_user_story_follow".
 *
 * @property int $user_id 成员
 * @property int $user_story_id 用户故事
 */
class UserStoryFollow extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_user_story_follow';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_story_id'], 'required'],
            [['user_id', 'user_story_id'], 'integer'],
            [['user_id', 'user_story_id'], 'unique', 'targetAttribute' => ['user_id', 'user_story_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '成员',
            'user_story_id' => '用户故事',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserStoryFollowQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserStoryFollowQuery(get_called_class());
    }
}
