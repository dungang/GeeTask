<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_acceptance_test".
 *
 * @property int $id
 * @property int $user_story_id 用户故事
 * @property string $case_item 内容
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class AcceptanceTest extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_acceptance_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_story_id', 'case_item', 'created_at', 'updated_at'], 'required'],
            [['user_story_id', 'created_at', 'updated_at'], 'integer'],
            [['case_item'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_story_id' => '用户故事',
            'case_item' => '内容',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AcceptanceTestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AcceptanceTestQuery(get_called_class());
    }
}
