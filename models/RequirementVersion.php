<?php

namespace app\models;


/**
 * This is the model class for table "requirement_version".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property string $name 名称
 */
class RequirementVersion extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirement_version';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'name'], 'required'],
            [['project_id'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
            'name' => '名称',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RequirementVersionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementVersionQuery(get_called_class());
    }
}
