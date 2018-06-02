<?php

namespace app\models;

/**
 * This is the model class for table "requirement_content".
 *
 * @property int $id
 * @property int $requirement_id
 * @property int $is_last 是最新
 * @property string $content 内容
 * @property int $created_at 添加时间
 */
class RequirementContent extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirement_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'requirement_id', 'content'], 'required'],
            [['id', 'requirement_id', 'is_last', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requirement_id' => 'Requirement ID',
            'is_last' => '是最新',
            'content' => '内容',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RequirementContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementContentQuery(get_called_class());
    }
}
