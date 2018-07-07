<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_virtual_user".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property string $name 名称
 * @property string $role 角色
 * @property string $photo 照片
 * @property string $intro 介绍
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $is_del
 */
class VirtualUser extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_virtual_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'name', 'role', 'photo', 'intro'], 'required'],
            [['project_id', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['intro'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['role'], 'string', 'max' => 32],
            [['photo'], 'string', 'max' => 128],
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
            'role' => '角色',
            'photo' => '照片',
            'intro' => '介绍',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return VirtualUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VirtualUserQuery(get_called_class());
    }
}
