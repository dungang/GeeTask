<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_idea".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property int $brain_storm_id 主题
 * @property string $content 内容
 * @property string $color 颜色
 * @property string $convert_type 转换类型
 * @property int $creator_id 创建人
 * @property int $updator_id 更新人
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $is_del
 */
class Idea extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_idea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['project_id', 'brain_storm_id', 'creator_id', 'updator_id', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['convert_type','color'], 'string'],
            [['content'], 'string', 'max' => 128],
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
            'brain_storm_id' => '主题',
            'content' => 'Idea',
            'color' => '颜色',
            'convert_type' => '转换类型',
            'creator_id' => '创建人',
            'updator_id' => '更新人',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return IdeaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IdeaQuery(get_called_class());
    }
}
