<?php

namespace app\models;


/**
 * This is the model class for table "gt_brain_storm".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property string $theme 主题
 * @property string $status 状态 
 * @property int $creator_id 创建者
 * @property int $updator_id 更新者
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property int $is_del
 */
class BrainStorm extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_brain_storm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'theme'], 'required','except'=>'Close'],
            [['status'],'required','on'=>'Close'],
            [['project_id', 'creator_id', 'updator_id', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['theme'], 'string', 'max' => 128],
            [['status'], 'string', 'max' => 32],
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
            'theme' => '主题',
            'status' => '状态',
            'creator_id' => '创建者',
            'updator_id' => '更新者',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BrainStormQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BrainStormQuery(get_called_class());
    }
}
