<?php

namespace app\models;


/**
 * This is the model class for table "requirement_content_done".
 *
 * @property int $id
 * @property int $requirement_id 来源
 * @property int $user_id 编辑人
 * @property string $status_code 状态
 * @property string $remark 备注
 * @property int $created_at 添加时间
 */
class RequirementContentDone extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirement_content_done';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_code', 'remark'], 'required'],
            [['requirement_id', 'user_id', 'created_at'], 'integer'],
            [['remark'], 'string'],
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
            'requirement_id' => '来源',
            'user_id' => '编辑人',
            'status_code' => '状态',
            'remark' => '备注',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RequirementContentDoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementContentDoneQuery(get_called_class());
    }
}
