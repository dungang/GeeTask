<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_release".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property string $version 版本
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $is_archived 是否归档
 * @property int $is_del
 */
class Release extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_release';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'version', 'created_at', 'updated_at'], 'required'],
            [['project_id', 'created_at', 'updated_at', 'is_archived', 'is_del'], 'integer'],
            [['version'], 'string', 'max' => 32],
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
            'version' => '版本',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'is_archived' => '是否归档',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReleaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReleaseQuery(get_called_class());
    }
}
