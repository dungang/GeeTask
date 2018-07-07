<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_project".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $intro 介绍
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $is_achived 归档
 * @property int $is_del
 */
class Project extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'intro'], 'required'],
            [['intro'], 'string'],
            [['created_at', 'updated_at', 'is_achived', 'is_del'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'intro' => '介绍',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'is_achived' => '归档',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
