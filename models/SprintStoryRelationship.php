<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_sprint_story_relationship".
 *
 * @property int $sprint_id 迭代
 * @property string $data 数据
 */
class SprintStoryRelationship extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_sprint_story_relationship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sprint_id', 'data'], 'required'],
            [['sprint_id'], 'integer'],
            [['data'], 'string'],
            [['sprint_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sprint_id' => '迭代',
            'data' => '数据',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SprintStoryRelationshipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SprintStoryRelationshipQuery(get_called_class());
    }
}
