<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_journal".
 *
 * @property int $id
 * @property int $user_story_id 用户故事
 * @property int $user_id 成员
 * @property string $content 内容
 * @property int $created_at 添加时间
 */
class Journal extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_journal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_story_id'], 'required'],
            [['user_story_id', 'user_id', 'created_at'], 'integer'],
            [['content'], 'string', 'max' => 255],
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
            'user_id' => '成员',
            'content' => '内容',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return JournalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JournalQuery(get_called_class());
    }
}
