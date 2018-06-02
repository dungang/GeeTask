<?php

namespace app\models;


/**
 * This is the model class for table "requirement".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property int $version_id 版本
 * @property int $pid 父节点
 * @property int $user_id 用户
 * @property string $title 标题
 * @property int $created_at 添加日期
 * @property int $updated_at 更新日期
 */
class Requirement extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'version_id', 'user_id'], 'required'],
            [['project_id', 'version_id', 'pid', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 128],
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
            'version_id' => '版本',
            'pid' => '父节点',
            'user_id' => '用户',
            'title' => '标题',
            'created_at' => '添加日期',
            'updated_at' => '更新日期',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RequirementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementQuery(get_called_class());
    }
}
