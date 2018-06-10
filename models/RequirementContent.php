<?php

namespace app\models;

/**
 * This is the model class for table "requirement_content".
 *
 * @property int $id
 * @property int $requirement_id 目录
 * @property int $user_id 编辑人
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
            [['content'], 'required'],
            [['requirement_id','created_at'], 'integer'],
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
            'user_id' => '编辑人',
            'requirement_id' => '标题',
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
    
    public static function findNewestOneByRequirmentId($requirement_id) {
        return RequirementContent::find()->where(['requirement_id'=>$requirement_id])->orderBy('id desc')->one();
    }
}
